<x-user-layout>
    <x-slot name="header">
        <div>
            <img class="h-40 w-full object-cover lg:h-60 sm:rounded-lg" src="{{ $user->profile_img}}"
                 alt="my profile image">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5 pb-4">
                <div class="flex">
                    <img class="h-24 w-24 rounded-full ring-4 ring-red-700 sm:h-32 sm:w-32" src="{{ $user->avatar }}"
                         alt="my avatar">
                </div>
            </div>
        </div>
    </x-slot>

    <div x-data="{ openTab: 1 }" class="p-6">
        <!-- Tabs -->
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a @click="openTab = 1" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Profile</a>
                    <a @click="openTab = 2" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Password </a>
                    <a @click="openTab = 3" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Notifications </a>
                    <a @click="openTab = 4" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Plan </a>
                    <a @click="openTab = 5" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Billing </a>
                    <a @click="openTab = 6" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Team Members </a>
                </nav>
            </div>
        </div>

        <div class="w-full">
            <div x-show="openTab === 1">
                <livewire:profiles.update-profile />
                <livewire:profiles.delete-user :user="$user" />
            </div>
            <div x-show="openTab === 2">
                <livewire:profiles.update-password />
            </div>
            <div x-show="openTab === 3">
                <livewire:profiles.two-factor-authentication />
            </div>
            <div x-show="openTab === 4">
                4
            </div>
            <div x-show="openTab === 5">
                5
            </div>
            <div x-show="openTab === 6">
                6
            </div>
        </div>
    </div>
</x-user-layout>

