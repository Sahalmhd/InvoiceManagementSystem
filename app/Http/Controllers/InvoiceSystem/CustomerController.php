<?php

namespace App\Http\Controllers\InvoiceSystem;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateCustomerRequet;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

     public function store(CustomerRequest $request)
    {

        $validated = $request->validated();

        $customer = new Customer;

        $customer->name = $validated['name'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'];
        $customer->address = $validated['address'];

        $customer->save();

        return redirect('customers')->with('message', 'Customer Added Sucessfullyy');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $customer = Customer::findOrFail($id);
    $invoices = $customer->invoice()->paginate(10);


    return view('customers.show',compact('customer','invoices'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequet $request, string $id)
    {
        $validated = $request->validated();



        $customer = Customer::findOrFail($id);

        $customer->name = $validated['name'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'];
        $customer->address = $validated['address'];

        $customer->save();

        return redirect('customers')->with('message', 'Customer Added Sucessfullyy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('customers')->with('delete', 'customer deleted');
    }
}
