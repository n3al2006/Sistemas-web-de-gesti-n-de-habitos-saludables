<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/dashboard-user.css') }} }}">
        <style>
            /* .dashboard-background {
                background-image: url('{{ asset("img/1401.jpg") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: relative;
            }
            .dashboard-background::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(15, 23, 42, 0.85);
            } */
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div id="app-container" class="min-h-screen dashboard-background">
            <div class="relative z-10">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main id="main-content">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>