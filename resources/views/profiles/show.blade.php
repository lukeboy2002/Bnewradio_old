<x-user-layout>

    <x-slot name="header">
        <div>
            <img class="h-40 w-full object-cover lg:h-60 sm:rounded-lg" src="{{asset('storage/'.$user->profile_img)}}"
                 alt="my profile image">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5 pb-4">
                <div class="flex">
                    <img class="h-24 w-24 rounded-full ring-4 ring-red-700 sm:h-32 sm:w-32" src="{{asset('storage/'.$user->avatar)}}" alt="my avatar">
                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="2xl:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-black text-red-700 truncate">{{ $user->username }}</h1>
                        <p class="flex text-xs text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
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

    @can ('edit', $user)

        <x-cards.default>

            <div x-data="{ openTab: 1 }">
                <!-- Tabs -->
                <div class="mt-6 mb-6 sm:mt-2 2xl:mt-5">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8">
                            <a @click="openTab = 1"
                               class="border-transparent text-gray-500 hover:border-gray-300 active:border-red-700 hover:border-red-700 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"><i class="fa-solid fa-address-card mr-2"></i>Profile</a>
                            <a @click="openTab = 2"
                               class="border-transparent text-gray-500 hover:border-gray-300 active:border-red-700 hover:border-red-700 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"><i class="fa-solid fa-key mr-2"></i>Password</a>
                            <a @click="openTab = 3"
                               class="border-transparent text-gray-500 hover:border-gray-300 active:border-red-700 hover:border-red-700 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"><i class="fa-solid fa-lock mr-2"></i>Two-factor authentication</a>
                            <a @click="openTab = 4"
                               class="border-transparent text-gray-500 hover:border-gray-300 active:border-red-700 hover:border-red-700 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"><i class="fa-solid fa-timeline mr-2"></i>Timeline</a>
                            <a @click="openTab = 5"
                               class="border-transparent text-gray-500 hover:border-gray-300 active:border-red-700 hover:border-red-700 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"><i class="fa-solid fa-trash-can mr-2"></i>Delete</a>
                        </nav>
                    </div>
                </div>

                <div>
                    <div x-show="openTab === 1" class="space-y-6">
                        <livewire:profiles.profile-change-form :user="$user" />
                    </div>
                    <div x-show="openTab === 2">
                        <livewire:profiles.password-change-form :user="$user"/>
                    </div>
                    <div x-show="openTab === 3">
                        <livewire:profiles.two-factor-form :user="$user"/>
                    </div>
                    <div x-show="openTab === 4">
                        @include('tweets._timeline', ['tweets' => $tweets])
                    </div>
                    <div x-show="openTab === 5">
                        <livewire:profiles.delete-user :user="$user" />
                    </div>
                </div>
            </div>
        </x-cards.default>

    @else
        <x-cards.default>
            <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Btweet</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Btweet by {{ $user->username }}</p>
            </div>
            <div class="border-t border-gray-200 py-5">
                @include('tweets._timeline', ['tweets' => $tweets])
            </div>
        </x-cards.default>
    @endcan

    <x-slot name="aside">
        @include('tweets._friends-list')
    </x-slot>
</x-user-layout>
