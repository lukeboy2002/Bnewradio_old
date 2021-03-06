@php
    $classes = 'inline-flex items-center px-2 py-1 text-xs font-medium rounded hover:ring-2 hover:ring-offset-2 hover:ring-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700';
@endphp

<button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
