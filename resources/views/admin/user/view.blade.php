@extends('admin.container')
@title($user->name)

@section('topCtrl')
    <div class="ui mini buttons">
        <a class="ui blue labeled icon button" href="{{ route('admin.users.edit', $user) }}">
            <i class="pencil icon"></i>
            Edit User
        </a>

        <a class="ui green labeled icon button" href="{{ route('admin.users.meters.add', $user) }}">
            <i class="add icon"></i>
            Add Meter
        </a>
    </div>
@endsection

@section('contents')
    <div class="ui two column grid">
        <div class="column">
            <h2 class="ui header">
                Personal Information
            </h2>

            <div class="ui list">
                <div class="item">
                    <i class="user icon"></i>
                    <div class="content">{{ $user->name }}</div>
                </div>
                <div class="item">
                    <i class="envelope icon"></i>
                    <div class="content"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
                </div>
                <div class="item">
                    <i class="phone icon"></i>
                    <div class="content"><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></div>
                </div>
            </div>
        </div>

        <div class="column">
            <h2 class="ui header">
                Billing Address
            </h2>

            {!! optional($user->address)->formatted ?? '<p>N/A</p>' !!}
        </div>
    </div>

    <div class="ui grid">
        <div class="sixteen wide column">
            <h2 class="ui header">
                Owned Meters
            </h2>

            @if ($user->meters->isNotEmpty())
                <item-list title="Available Meters" :count="{{ $user->meters->count() }}" :total="{{ $user->meters->count() }}">
                    <template>
                        @foreach ($user->meters as $meter)
                            @component('components.list_item')
                                @slot('key'){{ $meter->id }}@endslot
                                @slot('title')Meter #{{ $meter->id }}@endslot
                                @slot('viewLink'){{ route('admin.users.meters.view', [$user, $meter]) }}@endslot
                            @endcomponent
                        @endforeach
                    </template>
                </item-list>
            @else
                <div class="empty list">
                    No meters have been added yet.
                </div>
            @endif
        </div>

        <div class="sixteen wide column">
            <h2 class="ui header">
                User Invoices
            </h2>

            @if ($user->invoices->isNotEmpty())
                <item-list title="Available Invoices" :count="{{ $user->invoices->count() }}" :total="{{ $user->invoices->count() }}">
                    <template>
                        @foreach ($user->invoices as $invoice)
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
            @else
                <div class="empty list">
                    No invoices have been created for the user.
                </div>
            @endif
        </div>
    </div>
@endsection
