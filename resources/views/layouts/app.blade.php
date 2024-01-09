<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('storage') . '/uploads/icon.svg' }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation')
    <div class="h-screen bg-gray-100 dark:bg-gray-900 overflow-y-auto">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="navbar bg-base-100 py-6 px-6 sm:px-6 lg:px-8 dark:bg-gray-800 shadow">
                {{ $header }}
            </header>
        @endif

        <!-- Page Content -->
        <div class="p-8 flex justify-center">
            {{ $slot }}
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
