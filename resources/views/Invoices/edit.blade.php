@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-center">Create Product</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Customer Name</label>
                                <select class="selectpicker form-control" id=""name="customer_id"aria-label="Default select example" data-style="btn-white"data-live-search="true">
                                    <option value="{{ $invoice->customer->id }}"> {{ $invoice->customer->name }}</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <select name='product_id' id="product_id"class="selectpicker form-control "aria-label="Default select example" data-style="btn-white" data-live-search="true">
                                    <option value="{{ $invoice->product->id }}" selected>{{ $invoice->product->name }}</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }} - ₹{{ $product->price }}
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Quantity</label>
                                <input type="number" name="quantity"id="quantity"class="form-control   @error('quantity') is-invalid @enderror"value="{{ $invoice->quantity }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Total Amount</label>
                                <span id="total_amount" class="form-control"></span>
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
                var quantity = parseInt($('#quantity').val()) || {{ $invoice->quantity }};
                var price = parseFloat($('#product_id option:selected').data('price')) ||
                    {{ $invoice->product->price }};
                var total = price * quantity;
                $('#total_amount').text('₹' + total.toFixed(2));
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
