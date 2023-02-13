@extends('public.container')

@section('contents')
    <div class="ui center aligned statistics">
        <div class="ui small statistic">
            <div class="label">
                Your usage this month
            </div>
            <div class="value">
                <img src="{{ asset('svg/meter.svg') }}" class="ui inline image">
                {{ number_format($energyUsage) }}
            </div>
            <div class="label">kWh</div>
        </div>

        <div class="ui small statistic">
            <div class="label">
                Your available balance
            </div>
            <div class="value">
                <img src="{{ asset('svg/wallet.svg') }}" class="ui inline image">
                {{ number_format(optional($app->visitor->status)->balance) }}
            </div>
            <div class="label">BDT</div>
        </div>
    </div>

    <usage-charts meters-route="{{ route('meters.list') }}"></usage-charts>
@endsection
