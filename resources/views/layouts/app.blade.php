<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Your professional website description here">
        <meta name="keywords" content="your, keywords, here">
        <meta name="author" content="Your Name or Company">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/website.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    </head>

    <body class="font-sans antialiased bg-gray-100 text-gray-900">

        <!-- Navigation Bar -->
        @include('layouts.navigation')

        <!-- Page Heading (Header) -->
        @if (isset($header))
            <header class="bg-white shadow-md py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main Content Area -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer Section -->
        <footer class="bg-gray-900 text-white py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                    <div class="mt-4">
                        <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a> | 
                        <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
