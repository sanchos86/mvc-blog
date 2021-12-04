<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
</head>
<body>
    <div class="root">
        @include('frontend.components.header')
        <main class="flex-grow-1 py-4">
            <div class="container">
                <div class="row">
                    @yield('content')
                    @include('frontend.components.aside')
                </div>
            </div>
        </main>
        @include('frontend.components.footer')
    </div>
</body>
</html>
