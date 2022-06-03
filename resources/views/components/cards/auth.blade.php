@props([
    'heading',
])

<div class="min-h-full flex flex-col justify-center py-6 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-red-700">
            @if (isset($heading) && $heading != null )
                {{ $heading }}
            @endif
        </h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            {{ $slot }}
        </div>
    </div>
</div>
