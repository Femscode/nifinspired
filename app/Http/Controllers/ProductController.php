<?php

namespace App\Http\Controllers;

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
        $product = Product::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'category' => $request->category,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product Created Successfully',
            'product' => $product
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
    public function fetchProductWithCategory($id)
    {


        $product = Product::where('category_id', $id)->latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Product Fetched Successfully',
            'product' => $product
        ], 200);
    }
    //
}
