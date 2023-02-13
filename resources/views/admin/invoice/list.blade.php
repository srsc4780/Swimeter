@extends('admin.container')
@title('Manage Invoices')

@section('contents')
    <item-list title="Available Invoices" :count="{{ $invoices->count() }}" :total="{{ $invoices->total() }}">
        <template>
            @foreach ($invoices as $invoice)
                @component('components.list_item')
                    @slot('key'){{ $invoice->id }}@endslot
                    @slot('title')Invoice #{{ $invoice->id }}@endslot
                    @slot('description')
                        Status: {{ \Illuminate\Support\Str::ucfirst($invoice->status) }}@if ($invoice->amount), Amount: BDT {{ number_format($invoice->amount) }}@endif, Transaction ID: {{ $invoice->txn_id }}
                    @endslot
                    @slot('actions')
                        @if ($invoice->status == 'pending')
                            <a href="{{ route('admin.invoices.change-status', [$invoice, 'status' => 'approved']) }}" class="item"><i class="check icon"></i> Approve</a>
                            <a href="{{ route('admin.invoices.change-status', [$invoice, 'status' => 'declined']) }}" class="item"><i class="close icon"></i> Deny</a>
                        @endif
                    @endslot
                @endcomponent
            @endforeach
        </template>
    </item-list>
@endsection
