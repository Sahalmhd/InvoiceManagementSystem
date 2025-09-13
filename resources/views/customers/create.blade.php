@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center">Create Customers</h3>
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"class="form-control  @error('name') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="name"class="form-control mb-1  @error('email') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" id="name"class="form-control   @error('phone') is-invalid @enderror">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea type="text" name="address" id="name" class="form-control "></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Add Custuomer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
