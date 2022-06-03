@props(['name'])

<x-form.field_textarea>

    <textarea
        class="block w-full border-0 py-0 resize-none placeholder-gray-900 pt-2 sm:text-sm"
        name="{{ $name }}"
{{--        id="{{ $name }}"--}}
{{--        placeholder="{{ ucwords($name) }}"--}}
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

</x-form.field_textarea>

<x-form.error name="{{ $name }}" />
