@extends('admin.container')
@title('Dashboard')

@section('contents')
    <div class="ui center aligned statistics">
        <div class="ui small statistic">
            <div class="value">
                <img src="{{ asset('svg/users.svg') }}" class="ui inline image">
                {{ number_format($userCount) }}
            </div>
            <div class="label">
                Users
            </div>
        </div>

        <div class="ui small statistic">
            <div class="value">
                <img src="{{ asset('svg/meter.svg') }}" class="ui inline image">
                {{ number_format($meterCount) }}
            </div>
            <div class="label">
                Meters
            </div>
        </div>

        <div class="ui small statistic">
            <div class="value">
                <img src="{{ asset('svg/invoice.svg') }}" class="ui inline image">
                {{ number_format($pendingInvoiceCount) }}
            </div>
            <div class="label">
                Pending invoices
            </div>
        </div>
    </div>
@endsection
