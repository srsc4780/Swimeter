@extends('admin.container')

@if($user->exists)
    @title('Edit User: ' . $user->name)
    @h1('Edit User: <em>' . e($user->name) . '</em>')
@else
    @title('Add User')
@endif

@section('contents')
    @include('partials.user_edit_form', ['userTypeEditable' => true, 'action' => route('admin.users.update', $user)])
@endsection
