<x-user-layout>

    <x-slot name="main">
        <div class="px-4 pt-5 sm:px-6">
            <livewire:tweets.post-tweet  />
{{--            @include('tweets._publish-panel')--}}
        </div>
    </x-slot>

    <article class="bg-white border border-gray-200 shadow rounded-lg">
        @include('tweets._timeline')
    </article>

    <x-slot name="aside">
        @include('tweets._friends-list')
    </x-slot>

</x-user-layout>
