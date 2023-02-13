@extends('public.container')
@title('Manage Meters')

@section('contents')
    @if ($meters->isNotEmpty())
        <item-list title="Your Meters" :count="{{ $meters->count() }}" :total="{{ $meters->total() }}">
            <template>
                @foreach ($meters as $meter)
                    @component('components.list_item')
                        @slot('key'){{ $meter->id }}@endslot
                        @slot('title')Meter #{{ $meter->id }}@endslot
                        @slot('viewLink'){{ route('meters.view', $meter) }}@endslot
                    @endcomponent
                @endforeach
            </template>
        </item-list>
    @else
        <div class="empty list">
            You have yet to register a meter.
        </div>
    @endif
@endsection
