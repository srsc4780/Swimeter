@extends('admin.container')
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

    <usage-history consumptions-route="{{ route('admin.users.meters.consumptions', [$user, $meter]) }}"></usage-history>

    <div class="ui grid">
        <div class="sixteen wide column">
            <h2 class="ui header">
                Consumption History
            </h2>

            @if ($consumptions->isNotEmpty())
                <table class="ui very basic celled table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Total Usage</th>
                        <th>Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($consumptions as $order)
                        <tr>
                            <td>{{ $order->created_at->format('F j, Y H:i:s') }}</td>
                            <td>{{ $order->usage }}</td>
                            <td>{{ currency()->format($order->cost, 'BDT') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty list">
                    No consumption history found!
                </div>
            @endif
        </div>
    </div>
@endsection

