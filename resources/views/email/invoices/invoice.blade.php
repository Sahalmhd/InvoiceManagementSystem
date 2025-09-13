<x-mail::message>
# Hello {{ $invoice->customer->name }}

Your invoice has been updated.

<x-mail::button :url="route('invoices.view', encrypt($invoice->id))">
    View Invoice
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
