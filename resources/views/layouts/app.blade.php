<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />
</head>

@props(['header'])

<body class="antialiased relative h-full">
<div class="min-h-full">
    <x-menus.top />
{{--    <x-messages />--}}

    <div class="py-5">
        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>
{{--<x-footer />--}}

<!-- Scripts -->
<livewire:scripts />
<script src="{{ asset('js/app.js') }}"></script>
<script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
