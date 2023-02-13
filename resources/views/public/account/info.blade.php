@extends('public.container')
@title('Account Information')

@section('contents')
    @include('partials.user_edit_form', ['user' => $app->visitor, 'action' => route('account.info')])
@endsection
