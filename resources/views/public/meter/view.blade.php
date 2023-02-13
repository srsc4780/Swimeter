@extends('public.container')
@title('Meter #' . $meter->id)

@section('contents')
    <div class="ui grid">
        <div class="sixteen wide column">
            <h2 class="ui header">
                Details
            </h2>

            <div class="ui list">
                <div class="item">
                    <div class="content">
                        <div class="header">
                            UUID:
                        </div>
                        {{ $meter->uuid }}
                    </div>
                </div>

                <div class="item">
                    <div class="content">
                        <div class="header">
                            Total Usage:
                        </div>
                        {{ number_format($meter->consumptions()->latest()->first()->usage) }} kWh
                    </div>
                </div>

                <div class="item">
                    <div class="content">
                        <div class="header">
                            Status:
                        </div>

                        @if ($meter->status == 'active')
                            <div class="ui green label">Active</div>
                        @else
                            <div class="ui red label">Inactive</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <usage-history consumptions-route="{{ route('meters.consumptions.list', $meter) }}"></usage-history>
@endsection
