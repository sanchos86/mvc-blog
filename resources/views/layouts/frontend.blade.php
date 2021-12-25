<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', config('app.name'))</title>
    @yield('meta')

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" as="style">
    <link rel="preload" href="{{ asset('css/frontend.css') }}" as="style">
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
    <script>
        const mobileNav = document.querySelector('.mobile-nav');
        const mobileNavCloseBtn = document.querySelector('.mobile-nav__close-btn');
        const mobileNavOpenBtn = document.querySelector('.nav__mobile-menu-switch');

        mobileNavOpenBtn.addEventListener('click', () => {
          mobileNav.classList.add('mobile-nav--opened');
        });

        mobileNavCloseBtn.addEventListener('click', () => {
          mobileNav.classList.remove('mobile-nav--opened');
        });
    </script>
</body>
</html>
