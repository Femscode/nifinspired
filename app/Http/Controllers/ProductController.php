<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
                'category' => 'required',


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
                'category' => 'required',
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
            $product = Blog::create([
                'uuid' => Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'category' => $request->category,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Blog Created Successfully',
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


        $products = Product::where('category', $category)->latest()->get();
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

    public function deleteProducts(Request $request)
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
}
