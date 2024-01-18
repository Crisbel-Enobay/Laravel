<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function add()
    {
        return view('add');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        //dd($data);
        $product = Product::create($data);
        return redirect('/products');
    }
    public function show(Product $product)
    {
        return view('show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }
    public function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $product->update($data);
        return redirect('/products/' . $product->id);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
