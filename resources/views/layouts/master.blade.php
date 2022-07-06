<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
@include('partials.header')

@yield('content')

@include('partials.footer')

{{--Scripts js common--}}
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
{{--Scripts link to file or js custom--}}
@yield('scripts')
</body>
</html>
