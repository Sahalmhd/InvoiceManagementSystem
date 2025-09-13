<?php

namespace App\Http\Controllers\InvoiceSystem;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();


        $products = new Product;

        $products->name = $validated['name'];
        $products->price = $validated['price'];
        $products->description = $validated['description'];

        $products->save();

        return redirect('products')->with('message', 'Product Add Sucessfullyy');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $validated = $request->validated();

        $product = Product::findOrFail($id);

        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];

        $product->save();

        return redirect('products')->with('message', 'Product updated Sucessfullyy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('invoices')->with('delete', 'Product deleted');
    }
}
