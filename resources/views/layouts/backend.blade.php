<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Панель администратора</title>
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/backend.js') }}"></script>
</body>
</html>
