<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>
    @livewireStyles

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="h-full font-sans antialiased">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="min-h-full">
        @include('includes.header')

        <div class="py-10">
            {{ $slot ?? '' }}
        </div>
    </div>
    @livewireScripts

</body>

</html>