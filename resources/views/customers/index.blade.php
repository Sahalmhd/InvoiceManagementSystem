@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <a class="btn btn-secondary mb-2 " href="{{ route('dashboard') }}" role="button">
                    Dashboard</a>
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center"> Customers</h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @elseif (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif

                        <a class="btn btn-primary mb-2" href="{{ route('customers.create') }}" role="button">Create Customers</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a
                                                    href="{{ route('customers.show', $customer->id) }}"class="btn p-0 text-info">
                                                    <i class="bi bi-eye" style="font-size:18px;"></i>
                                                </a>
                                                <a
                                                    href="{{ route('customers.edit', $customer->id) }}"class="btn p-0 text-success">
                                                    <i class="bi bi-pencil-square" style="font-size:18px;"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn p-0 bg-transparent border-0 text-danger">
                                                        <i class="bi bi-trash" style="font-size:18px;"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
