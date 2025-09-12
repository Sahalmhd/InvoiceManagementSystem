<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

{{-- 
@component('mail::message')
# Hello {{ $invoice->customer->name }}

Your invoice #{{ $invoice->id }} has been generated.

**Product:** {{ $invoice->product->name }}  
**Quantity:** {{ $invoice->quantity }}  
**Total:** ₹{{ number_format($invoice->total_amount, 2) }}

@component('mail::button', ['url' => route('invoices.show', $invoice->id)])
View Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
