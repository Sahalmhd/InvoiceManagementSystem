@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center">Create Product</h3>

                        <form action="{{ route('invoices.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Customer Name</label>
                                <select class="selectpicker form-control" id="" name="customer_id" aria-label="Default select example" data-style="btn-white" data-live-search="true">
                                    <option selected>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <select name='product_id' id="product_id"class="selectpicker form-control "aria-label="Default select example" data-style="btn-white" data-live-search="true">
                                    <option selected>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                            {{ $product->name }} - ₹{{ $product->price }}
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity"class="form-control   @error('quantity') is-invalid @enderror" value="1" min="1">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Total Amount</label>
                                <span id="total_amount" class="form-control">₹0.00</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.selectpicker').selectpicker({});

            function calculateTotal() {
                var quantity = parseInt($('#quantity').val()) || 0;
                var price = parseFloat($('#product_id option:selected').data('price')) || 0;
                var total = price * quantity;
                $('#total_amount').text('₹' +total.toFixed(2));
            }

            $('#product_id').change(function() {
                calculateTotal();
            });

            $('#quantity').on('input', function() {
                calculateTotal();
            });

            calculateTotal();
        });
    </script>
@endpush
