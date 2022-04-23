<x-user-layout>

    <x-slot name="header">
        <div>
            <img class="h-40 w-full object-cover lg:h-60 sm:rounded-lg" src="{{ $user->profile_img}}" alt="my profile image">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5 pb-4">
                <div class="flex">
                    <img class="h-24 w-24 rounded-full ring-4 ring-red-700 sm:h-32 sm:w-32" src="{{ $user->avatar }}" alt="my avatar">
                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="2xl:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-black text-red-700 truncate">{{ $user->username }}</h1>
                        <p class="flex text-xs text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                        @can ('edit', $user)
                            <x-links.default_btn_large href="{{ route('profile.edit', $user->username) }}" class="bg-green-400 text-center">
                                <i class="fas fa-user-edit mr-2"></i>Edit
                            </x-links.default_btn_large>
                        @endcan
                        @unless (current_user()->is($user))
                            <x-buttons.large class="bg-gray-500">
                                <i class="far fa-envelope mr-2"></i>Message
                            </x-buttons.large>
                            <form method="POST" action="/profiles/{{ $user->username }}/follow">
                                @csrf
                                <x-buttons.follow :user="$user" />
                            </form>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <section aria-labelledby="applicant-information-title">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Btweet</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Btweet by {{ $user->username }}</p>
            </div>
            <div class="border-t border-gray-200 py-5">
                @include('tweets._timeline', ['tweets' => $tweets])
            </div>
        </div>
    </section>

    <x-slot name="aside">
        @include('tweets._friends-list')
    </x-slot>
</x-user-layout>
