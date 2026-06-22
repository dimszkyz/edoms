<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EDOM Universitas Ngudi Waluyo')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body>
    @include('component.header')

    @yield('content')

    @include('component.footer')

    @yield('scripts')
</body>
</html>
