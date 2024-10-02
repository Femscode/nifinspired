<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createCategory(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $checkcat = Category::where('name', $request->name)->first();
            if ($checkcat) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category Already Exist',

                ], 200);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->move(public_path('category_images'), $imageName);
            } else {
                $imageName = null; // No image provided
            }

            $category = Category::create([

                'name' => $request->name,
                'description' => $request->description,
                'image' => $imageName,
            ]);

            $category['image'] = "https://connectinskillz.com/nifinspired_files/public/category_images/" . $imageName;


            return response()->json([
                'status' => true,
                'message' => 'Category Created Successfully',
                'category' => $category
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function fetchCategory()
    {
        $categories = Category::latest()->get();
        foreach ($categories as $cat) {
            $cat->image = "https://connectinskillz.com/nifinspired_files/public/category_images/" . $cat->image;
        }
        return response()->json([
            'status' => true,
            'message' => 'All Categories Fetched Successfully',
            'categories' => $categories
        ], 200);
    }
    public function deleteategory($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return response()->json([
                'status' => true,
                'message' => 'Category Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function createProduct(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required',
                'category' => 'required|array',


            ]);



            $checkpro = Product::where('name', $request->name)->first();
            if ($checkpro) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product Already Exist',
                ], 200);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->move(public_path('product_images'), $imageName);
            } else {
                $imageName = null; // No image provided
            }

            $product = Product::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imageName,
                'category' => $request->category,
                'quantity' => $request->quantity ?? 0, // If quantity is not provided, default to 0
                'usage' => $request->usage ?? null, // If quantity is not provided, default to 0
                'allergenes' => $request->allergenes ?? null, // If quantity is not provided, default to 0
                'functions' => $request->functions ?? null, // If quantity is not provided, default to 0
                'contents' => $request->contents ?? null, // If quantity is not provided, default to 0
            ]);

            $product['image'] = "https://connectinskillz.com/nifinspired_files/public/product_images/" . $imageName;
            return response()->json([
                'status' => true,
                'message' => 'Product Created Successfully',
                'product' => $product
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function createBlog(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'image' => 'required',
                'description' => 'required',
                'blog' => 'required',
            ]);
            $checkpro = Blog::where('title', $request->title)->first();
            if ($checkpro) {
                return response()->json([
                    'status' => false,
                    'message' => 'Blog Title Already Exist',

                ], 200);
            }
            if ($request->image !== null) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->move(public_path('blog_images'), $imageName);
            }
            $blog = Blog::create([
                'uuid' => Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'blog' => $request->blog,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Blog Created Successfully',
                'blog' => $blog
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function createContactUs(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required'
            ]);



            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'Message / Complaint sent successfully!',
                'contact' => $contact
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function fetchProduct()
    {
        $products = Product::latest()->get();

        foreach ($products as $product) {
            $product->image = "https://connectinskillz.com/nifinspired_files/public/product_images/" . $product->image;
        }
        return response()->json([
            'status' => true,
            'message' => 'All Products Fetched Successfully',
            'product' => $products
        ], 200);
    }
    public function fetchContactUs()
    {
        $contact = Contact::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'ContactUs Messages/Complaint Fetched Successfully',
            'contact' => $contact
        ], 200);
    }
    public function fetchBlog()
    {
        $blogs = Blog::latest()->get();
        foreach ($blogs as $blog) {
            $blog->image = "https://connectinskillz.com/nifinspired_files/public/blog_images/" . $blog->image;
        }
        return response()->json([
            'status' => true,
            'message' => 'All Blogs Fetched Successfully',
            'blogs' => $blogs
        ], 200);
    }
    public function fetchSingleProduct($id)
    {


        $product = Product::find($id);

        $product['image'] = "https://connectinskillz.com/nifinspired_files/public/product_images/" . $product->image;

        return response()->json([
            'status' => true,
            'message' => 'Single Product Fetched Successfully',
            'product' => $product
        ], 200);
    }
    public function fetchSingleBlog($id)
    {
        $blog = Blog::find($id);

        $blog['image'] = "https://connectinskillz.com/nifinspired_files/public/blog_images/" . $blog->image;

        return response()->json([
            'status' => true,
            'message' => 'Blog Fetched Successfully',
            'blog' => $blog
        ], 200);
    }
    public function fetchProductWithCategory($category)
    {


        // $products = Product::where('category', $category)->latest()->get();
        $products = Product::whereJsonContains('category', $category)->latest()->get();


        foreach ($products as $product) {
            $product->image = "https://connectinskillz.com/nifinspired_files/public/product_images/" . $product->image;
        }
        return response()->json([
            'status' => true,
            'message' => 'Product Fetched Successfully',
            'product' => $products
        ], 200);
    }
    public function olddeleteProduct(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
            foreach ($ids as $id) {
                $product = Product::find($id);
                $productPath = public_path('product_images') . '/' . $product->image;
                if (file_exists($productPath)) {
                    unlink($productPath);
                }
                $product->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Product Deleted Successfully',

                ], 200);
            }
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteProduct(Request $request)
    {
        $ids = $request->input('ids', '');

        // Convert the ids to an array if they are not already
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }

        try {
            foreach ($ids as $id) {
                $product = Product::find($id);
                if ($product) {
                    $productPath = public_path('product_images') . '/' . $product->image;
                    if (file_exists($productPath)) {
                        unlink($productPath);
                    }
                    $product->delete();
                }
            }
            return response()->json(['success' => true, 'message' => 'Products deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);

            $category->delete();
            return response()->json([
                'status' => true,
                'message' => 'Category Deleted Successfully',

            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function deleteBlog($id)
    {
        try {
            $blog = Blog::find($id);
            $blogPath = public_path('blog_images') . '/' . $blog->image;
            if (file_exists($blogPath)) {
                unlink($blogPath);
            }
            $blog->delete();
            return response()->json([
                'status' => true,
                'message' => 'Blog Deleted Successfully',

            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function fetchBlogWithCategory($cat)
    {

        $blog = Blog::where('category', $cat)->latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'Blog Fetched Successfully',
            'blog' => $blog
        ], 200);
    }
    //
    public function create_product($productId = null)
    {
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $product = Product::find($productId);


            $ng = $stripe->products->create(['name' => $product->name]);


            $payment =  $stripe->prices->create([
                'product' => $ng->id,
                'unit_amount' => ceil($product->price * 100),
                'currency' => 'usd',
            ]);
            //here is the response I got from the very first request {"status":true,"message":"Product created successfully!","data":{"id":"price_1NttwHAvZkWDJwLRIwVf4TrA","object":"price","active":true,"billing_scheme":"per_unit","created":1695568181,"currency":"usd","custom_unit_amount":null,"livemode":false,"lookup_key":null,"metadata":[],"nickname":null,"product":"prod_OhIUEFIceLlm5y","recurring":null,"tax_behavior":"unspecified","tiers_mode":null,"transform_quantity":null,"type":"one_time","unit_amount":100,"unit_amount_decimal":"100"}}
            $product->price_id = $payment->id;
            $product->save();
            return response()->json([
                'status' => true,
                'message' => 'Product created successfully!',
                'data' => $payment

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function make_payment($price_id  = null)
    {
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            header('Content-Type: application/json');

            $YOUR_DOMAIN = 'https://nifinspired.connectinskillz.com/api';

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price' => $price_id,
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'https://nifinspired.connectinskillz.com/api/success_payment',
                'cancel_url' => 'https://nifinspired.connectinskillz.com/api/failed_payment',
            ]);

            return $checkout_session;

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);


            return response()->json([
                'status' => true,
                'message' => 'Payment Made!',

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function success_payment(Request $request)
    {
        file_put_contents(__DIR__ . '/stripelog.txt', json_encode($request->all(), JSON_PRETTY_PRINT), FILE_APPEND);

        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $session = $stripe->checkout->sessions->retrieve($request->session_id);

            // Retrieve metadata
            $orderId = $session->metadata->order_id;
            $userEmail = $session->metadata->user_email;

            // Prepare data for the email
            $data = [
                'order_id' => $orderId,
                'amount' => $session->amount_total / 100, // Assuming the amount is in cents
                'currency' => $session->currency,
            ];

            // Send email to the user
            Mail::send('mail.payment-success', $data, function ($message) use ($userEmail) {
                $message->to($userEmail)->subject('Your Payment was Successful');
                $message->from('support@nifinspired.com', 'Nifinspired');
            });

            // Send email to the admin
            Mail::send('mail.payment-success-admin', $data, function ($message) {
                $message->to(['fasanyafemi@gmail.com', 'support@nifinspired.com'])->subject('New Payment Received');
                $message->from('support@nifinspired.com', 'Nifinspired');
            });

            // Return a successful response or redirect
            return response()->json(['status' => 'success', 'order_id' => $orderId], 200);
        } catch (\Exception $e) {
            file_put_contents(__DIR__ . '/stripelog_errors.txt', $e->getMessage() . "\n", FILE_APPEND);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
        return response()->json("OK", 200);
    }

    public function createPayment(Request $request)
    {
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            header('Content-Type: application/json');
            $ng = $stripe->products->create(['name' => 'Quick Checkout']);
            $payment =  $stripe->prices->create([
                'product' => $ng->id,
                'unit_amount' => ceil($request->amount * 100),
                'currency' => $request->currency,
            ]);
            $orderId = uniqid('order_');
            $userEmail = $request->email;

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price' => $payment->id,
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'https://nifinspired.connectinskillz.com/api/success_payment',
                'cancel_url' => 'https://nifinspired.connectinskillz.com/api/failed_payment',
                'metadata' => [
                    'order_id' => $orderId,
                    'user_email' => $userEmail,
                ],
            ]);

            return $checkout_session;
        } catch (\Throwable $th) {
            file_put_contents(__DIR__ . '/stripelog_errors.txt', $e->getMessage() . "\n", FILE_APPEND);

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function save_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order_id' => 'required',
                'order_details' => 'required',
                'total_price' => 'required',
                'customer_email' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 400);
            }
            $order = Order::create([
                'order_id' => $request->order_id,
                'order_details' => $request->order_details,
                'total_price' => $request->total_price,
                'customer_email' => $request->customer_email,
                'status' => "pending"
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Order saved successfully!',
                'data' => $order

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function fetch_single_order(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order_id' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 400);
            }
            $order = Order::where('order_id',$request->order_id)->first();
            return response()->json([
                'status' => true,
                'message' => 'Order fetched successfully!',
                'data' => $order

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function fetch_all_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'order_id' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 400);
            }
            $order = Order::latest()->get();
            return response()->json([
                'status' => true,
                'message' => 'Order fetched successfully!',
                'data' => $order

            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
