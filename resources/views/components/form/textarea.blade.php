@props(['name'])

<x-form.field>

    <textarea
        class="block rounded-lg w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />

</x-form.field>
