@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center"> Invoices</h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @elseif (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif
                        <a class="btn btn-primary mb-2" href="{{ route('invoices.create') }}" role="button">Create
                            Invoices</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantiy</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Invoice date</th>
                                    <th scope="col">Due date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->customer->name }}</td>
                                        <td>{{ $invoice->product->name }}</td>
                                        <td>{{ $invoice->quantity }}</td>
                                        <td>{{ $invoice->total_amount }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td>{{ $invoice->due_date }}</td>
                                        <td>

                                            <a
                                                href="{{ route('invoices.edit', $invoice->id) }}"class="btn p-0 text-success">
                                                <i class="bi bi-pencil-square" style="font-size:18px;"></i>
                                            </a>
                                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0 bg-transparent border-0 text-danger">
                                                    <i class="bi bi-trash" style="font-size:18px;"></i>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $invoices->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
