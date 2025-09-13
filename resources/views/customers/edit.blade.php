@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center">Create Customers</h3>

                        <form action="{{ route('customers.update',$customer->id) }}" method="POST">
                            @csrf
                                @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label"> Name</label>
                                <input type="text" name="name" id="name" value="{{$customer->name}}"class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Email</label>
                                <input type="text" name="email" id="name"value="{{$customer->email }}"
                                    class="form-control   @error('email ') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone</label>
                                <input type="tel" name="phone" id="name"value="{{$customer->phone }}"
                                    class="form-control   @error('phone') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Address</label>
                                <textarea type="text" name="address" id="name" class="form-control ">{{$customer->address }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
