@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                 <a class="btn btn-secondary mb-2 " href="{{ route('dashboard') }}" role="button">Dashboard</a>
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center"> Product</h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @elseif (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif
                        <a class="btn btn-primary mb-2" href="{{ route('products.create') }}" role="button">Create Products</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>

                                            <a
                                                href="{{ route('products.edit', $product->id) }}"class="btn p-0 text-success">
                                                <i class="bi bi-pencil-square" style="font-size:18px;"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
