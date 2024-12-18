<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);        
        
        Product::create($validatedData);
        
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $validatedData = $request->all();

        $produk = Product::find($id);
        $produk->update($validatedData);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $produk = Product::find($id);
        $produk->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
