@extends('admin.container')
@title('Manage Users')

@section('topCtrl')
    <div class="ui mini buttons">
        <a class="ui blue labeled icon button" href="{{ route('admin.users.add') }}">
            <i class="add icon"></i>
            Add User
        </a>
    </div>
@endsection

@section('contents')
    @if ($users->isNotEmpty())
        <item-list title="Available Users" :count="{{ $users->count() }}" :total="{{ $users->total() }}">
            <template>
                @foreach ($users as $user)
                    @component('components.list_item')
                        @slot('key'){{ $user->id }}@endslot
                        @slot('title'){{ $user->name }}@endslot
                        @slot('viewLink'){{ route('admin.users.view', $user) }}@endslot
                        @slot('editLink'){{ route('admin.users.edit', $user) }}@endslot
                    @endcomponent
                @endforeach
            </template>
        </item-list>
    @else
        <div class="empty list">
            No users have been added.
        </div>
    @endif
@endsection
