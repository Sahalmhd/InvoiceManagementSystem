<x-mail::message>
# Hello {{ $invoice->customer->name }}

Your invoice has been updated.

<x-mail::button :url="route('invoices.show', $invoice->id)">
    View Invoice
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
