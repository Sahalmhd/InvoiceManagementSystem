@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center">Update Product</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ route('products.update',$product->id) }}" method="POST">
                            @csrf
                                @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" id="name" value="{{$product->name}}"
                                    class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Product price</label>
                                <input type="number" name="price" id="name"value="{{$product->price }}"
                                    class="form-control   @error('price') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product description</label>
                                <textarea type="text" name="description" id="name" class="form-control ">{{$product->description }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection