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


        $category = Category::create([

            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Category Created Successfully',
            'category' => $category
        ], 200);
    }
    public function fetchCategory()
    {
        $category = Category::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'All Categories Fetched Successfully',
            'categories' => $category
        ], 200);
    }
    public function deleteategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category Deleted Successfully',           
        ], 200);
    }

    public function createProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        $checkpro = Product::where('name', $request->name)->first();
        if ($checkpro) {
            return response()->json([
                'status' => false,
                'message' => 'Product Already Exist',

            ], 200);
        }
        return "here";
        if ($request->image !== null) {
            return $request->image;
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('product_images'), $imageName);
            $product = Product::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imageName,
                'category' => $request->category,
                'category_id' => $request->category_id,
                'quantity' => $request->quantity
            ]);
        } else {
            $product = Product::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
              
                'category' => $request->category,
                'category_id' => $request->category_id,
                'quantity' => $request->quantity
            ]);
        }
      

        return response()->json([
            'status' => true,
            'message' => 'Product Created Successfully',
            'product' => $product
        ], 200);
    }
    public function createBlog(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
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
            'title' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'category' => $request->category,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Blog Created Successfully',
            'product' => $product
        ], 200);
    }
    public function createContactUs(Request $request)
    {
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
    }
    public function fetchProduct()
    {
        $product = Product::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'All Products Fetched Successfully',
            'product' => $product
        ], 200);
    }
    public function fetchContactUs()
    {
        $contact = Contact::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'ContactUs Messages/Complaint Fetched Successfully',
            'product' => $contact
        ], 200);
    }
    public function fetchBlog()
    {
        $blogs = Blog::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'All Blogs Fetched Successfully',
            'blogs' => $blogs
        ], 200);
    }
    public function fetchSingleProduct($id)
    {


        $product = Product::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Single Product Fetched Successfully',
            'product' => $product
        ], 200);
    }
    public function fetchSingleBlog($id)
    {
        $blog = Blog::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Blog Fetched Successfully',
            'product' => $blog
        ], 200);
    }
    public function fetchProductWithCategory($id)
    {


        $product = Product::where('category_id', $id)->latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Product Fetched Successfully',
            'product' => $product
        ], 200);
    }
    public function deleteProduct($id)
    {
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
    public function deleteCategory($id)
    {
        $category = Category::find($id);
       
        $category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category Deleted Successfully',

        ], 200);
    }
    public function deleteBlog($id)
    {
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
    }
    public function fetchBlogWithCategory($cat)
    {
        $blog = Blog::where('category', $cat)->latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'Blog Fetched Successfully',
            'product' => $blog
        ], 200);
    }
    //
}
