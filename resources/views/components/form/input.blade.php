@props(['name'])
@php
    $classes = 'appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-500 text-gray-500 focus:outline-none focus:ring-red-700 focus:border-red-700 sm:text-sm';
@endphp

<x-form.field>
    <input {{ $attributes->merge(['class' => $classes]) }}
           name="{{ $name }}"
           id="{{ $name }}"
           aria-label="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >
    <x-form.error name="{{ $name }}"/>
</x-form.field>
