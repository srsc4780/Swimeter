@extends('public.simple_container')
@title('Login')

@section('contents')
    <section id="main">
        <form class="ui ajax login form" action="{{ route('login') }}" method="post" data-redirect="true">
            <div class="field">
                <label for="ctrl_email">Email Address</label>
                <input type="email" id="ctrl_email" name="email" placeholder="john@doe.com">
            </div>

            <div class="field">
                <label for="ctrl_password">Password</label>
                <input type="password" id="ctrl_password" name="password">
            </div>

            <button class="ui blue fluid button">Sign in</button>

            {!! csrf_field() !!}
        </form>
    </section>
@endsection
