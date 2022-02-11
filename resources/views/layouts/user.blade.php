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

<body class="antialiased relative h-full">
<div class="min-h-full">
    <x-menus.top />


    <div>
        <div class="max-w-3xl mx-auto sm:px-6 md:max-w-7xl md:px-8 md:grid md:grid-cols-12 md:gap-8">
            <div class="hidden md:block md:col-span-3 lg:col-span-2">
                <div class="sticky top-4 space-y-2 py-4">
                    <x-menus.sidebar />
                </div>
            </div>
            <div class="md:col-span-9 lg:col-span-10 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>

    {{--    <x-footer />--}}
</div>

<!-- Scripts -->
<livewire:scripts />
<script src="{{ asset('js/app.js') }}"></script>
<script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
