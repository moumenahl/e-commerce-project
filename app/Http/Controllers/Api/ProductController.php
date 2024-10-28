<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //fetch all product
    public function index() {
        $products = Product::all();
        return response()->json(ProductResource::collection($products) , 200);
    }
    //fetch 
    public function getProductsByCategory(string $categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $products = $category->products;
        return response()->json(ProductResource::collection($products), 200);
    }
    
}
