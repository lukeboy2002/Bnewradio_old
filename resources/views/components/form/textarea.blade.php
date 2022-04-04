@props(['name'])

<x-form.field_textarea>

    <label for="{{ $name }}" class="sr-only" name="{{ $name }}"></label>

    <x-form.input_textarea name="{{ $name }}" />

    <textarea
        class="block w-full border-0 py-0 resize-none placeholder-gray-500 focus:ring-0 sm:text-sm"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error class="ml-4" name="{{ $name }}" />


</x-form.field_textarea>
