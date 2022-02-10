@props(['name'])

<label class="block text-sm font-medium mb-2 text-gray-700 "
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>
