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
                    <a @click="openTab = 1" href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> General </a>
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
                <div class="mt-10 divide-y divide-gray-200">
                    <div class="space-y-1">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Profile</h3>
                        <p class="max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                    </div>
                    <div class="mt-6">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <span class="flex-grow">{{ $user->username }}</span>
                                    <x-buttons.default class="bg-green-700 mr-2">Edit</x-buttons.default>
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                  <span class="flex-grow">
                                    <img class="h-8 w-8 rounded-full" src="{{ $user->avatar }}" alt="">
                                  </span>
                                    <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                                    <button type="button" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Update</button>
                                    <span class="text-gray-300" aria-hidden="true">|</span>
                                    <button type="button" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Remove</button>
                                  </span>
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <span class="flex-grow">{{ $user->email }}</span>
                                    <x-buttons.default class="bg-green-700 mr-2">Edit</x-buttons.default>
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200">
                                <dt class="text-sm font-medium text-gray-500">Job title</dt>
                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <span class="flex-grow">Human Resources Manager</span>
                                    <span class="ml-4 flex-shrink-0">
                                    <button type="button" class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Update</button>
                                  </span>
                                </dd>
                            </div>

                            <form method="POST" action="{{ route('profile.destroy', $user->id)}}">
                                @csrf
                                @method('delete')
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200">
                                    <dt class="text-sm font-medium text-gray-500">Delete account</dt>
                                    <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow">Delete my account</span>
                                        <x-buttons.default class="bg-red-700 mr-2">Delete</x-buttons.default>
                                    </dd>
                                </div>
                            </form>

                        </dl>
                    </div>
                </div>







            </div>
            <div x-show="openTab === 2">2</div>
            <div x-show="openTab === 3">3</div>
            <div x-show="openTab === 4">4</div>
            <div x-show="openTab === 5">5</div>
            <div x-show="openTab === 6">6</div>
        </div>
    </div>
</x-user-layout>

