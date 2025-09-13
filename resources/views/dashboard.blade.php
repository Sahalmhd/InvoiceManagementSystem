<x-app-layout>

    <style>
        .btn {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            width: 150px;
            text-align: center
        }

        .btn-primary {
            background: rgb(104, 110, 116);
            color: #fff;
        }


        .btn-secondary {
            background: #8f9795;
            color: #fff;
        }


        .btn-info-subtle {
            background: #888d92;
            color: #fff;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    {{-- <x-nav-link :href="route('products.create')">
                        {{ __('Create Products') }}
                    </x-nav-link> --}}

                    <div class="p-6">
                        <div class="mb-4">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary">Customers page</a>
                        </div>
                        <div class="mb-4">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Product page</a>
                        </div>
                        <div class="mb-4">
                            <a href="{{ route('invoices.index') }}" class="btn btn-info-subtle">Invoice page</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    </div>
</x-app-layout>
