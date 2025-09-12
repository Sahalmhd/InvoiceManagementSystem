<?php

namespace App\Http\Controllers\InvoiceSystem;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with(['customer', 'product'])->paginate(10);


        return view('Invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('Invoices.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $total = $product->price * $validated['quantity'];

        $invoice = new Invoice;
        $invoice->customer_id = $validated['customer_id'];
        $invoice->product_id = $validated['product_id'];
        $invoice->quantity = $validated['quantity'];
        $invoice->total_amount = $total;
        $invoice->invoice_date = now();
        $invoice->due_date = now()->addWeek();
        $invoice->save();

        return redirect('invoices')->with('message', 'invoices Added Sucessfullyy');
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

        $invoice = Invoice::findOrFail($id);

        $customers = Customer::all();
        $products = Product::all();


        return view('Invoices.edit', compact('invoice', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $total = $product->price * $validated['quantity'];

        $invoice = Invoice::findOrFail($id);

        $invoice->customer_id = $validated['customer_id'];
        $invoice->product_id = $validated['product_id'];
        $invoice->quantity = $validated['quantity'];
        $invoice->total_amount = $total;
        $invoice->invoice_date = now();
        $invoice->due_date = now()->addWeek();
        $invoice->save();
        return redirect('invoices')->with('message', 'invoices updated Sucessfullyy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect('products')->with('delete', 'Invoice deleted Sucessfullyy');
    }
}
