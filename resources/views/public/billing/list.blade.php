@extends('public.container')
@title('Your Bills')

@section('contents')
    <form class="ui small ajax form" data-redirect="on" action="{{ route('billing.add-transaction') }}" method="post">
        <h4 class="ui header">Validate New Transaction</h4>

        <div class="field">
            <label for="ctrl_txn_id">Bkash Transaction ID</label>
            <input id="ctrl_txn_id" name="txn_id">
        </div>

        <button class="ui icon labeled green button">
            <i class="paper plane icon"></i>
            Validate
        </button>
    </form>

    <item-list title="Your Invoices" :count="{{ $invoices->count() }}" :total="{{ $invoices->total() }}">
        <template>
            @foreach ($invoices as $invoice)
                @component('components.list_item')
                    @slot('key'){{ $invoice->id }}@endslot
                    @slot('title')Invoice #{{ $invoice->id }}@endslot
                    @slot('description')
                        Status: {{ \Illuminate\Support\Str::ucfirst($invoice->status) }}@if ($invoice->amount), Amount: BDT {{ number_format($invoice->amount) }}@endif
                    @endslot
                @endcomponent
            @endforeach
        </template>
    </item-list>
@endsection
