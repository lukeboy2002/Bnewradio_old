<x-user-layout>
    <article class="bg-white border border-gray-200 shadow rounded-lg">
        <div class="px-4 pt-5 sm:px-6">
            @include('tweets._publish-panel')
        </div>

        @include('tweets._timeline')
    </article>

    <x-slot name="aside">
        @include('tweets._friends-list')
    </x-slot>

</x-user-layout>
