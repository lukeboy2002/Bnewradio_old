@php
    $classes = 'inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white hover:ring-2 hover:ring-offset-2 hover:ring-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
