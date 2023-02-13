<!doctype html>
<html lang="{{ app()->getLocale() }}" id="{{ $type }}">
<head>
    @include('html.head')
</head>
<body class="{{ str_replace('.', ' ', $app->viewName) }} page">
    <div id="app">
        @yield('__contents__')
    </div>

    @include('html.javascript')
</body>
</html>
