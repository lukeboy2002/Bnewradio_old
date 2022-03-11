@props(['name'])

@php
    $classes = 'text-red-500 text-xs';
@endphp

@error($name)
<p {{ $attributes->merge(['class' => $classes]) }}>{{ $message }}</p>
@enderror
