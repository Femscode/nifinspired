<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = Product::create([
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
    public function fetchProduct() {
        $product = Product::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'All Products Fetched Successfully',            
            'product' => $product
        ], 200);
    }
    public function fetchProductWithCategory($id) {
       

        $product = Product::where('category_id',$id)->latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Product Fetched Successfully',            
            'product' => $product
        ], 200);
    }
    //
}
