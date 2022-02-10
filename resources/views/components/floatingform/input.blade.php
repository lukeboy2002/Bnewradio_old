@props(['name'])
@php
    $classes = 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer';
@endphp

<x-floatingform.field>
<input {{ $attributes->merge(['class' => $classes]) }}
       name="{{ $name }}"
       id="{{ $name }}"
       aria-label="{{ $name }}"
       {{ $attributes(['value' => old($name)]) }}
       placeholder=" "
/>
    <x-floatingform.label name="{{ $name }}" />
    <x-floatingform.error name="{{ $name }}"/>
</x-floatingform.field>
