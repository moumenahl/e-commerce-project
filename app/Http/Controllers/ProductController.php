<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Http\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadImageTrait;
    
    public function index()
    {
        $product = Product::OrderBy('created_at' , 'asc' )->get();
        return view('admin.products.list' , ['products'=> $product ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.create' , ['categories'=>$category]);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        $product->categories()->sync($request->categories);
        return redirect()->route('products.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findorfail($id);
        return view('admin.products.show' , ['product'=>$product]);
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findorfail($id);
        $category = Category::all();
        return view('admin.products.edit' , ['product'=>$product , 'categories'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
            if (!$product) {
            return redirect()->back()->withErrors('product not found.');
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
    public function trash(){
        $products = Product::onlyTrashed()->get();
        return view('trash', compact('products'));
    }
    public function restore($id){
        $products = Product::withTrashed()->findOrFail($id);
        $products->restore();
        return redirect()->route('products.trash')->with('success', 'Product restored successfully.');
    }
}