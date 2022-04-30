<div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
    <h2 id="timeline-title" class="text-lg font-medium text-gray-500"><i class="fa-solid fa-users mr-2"></i>Friends</h2>
    <div class="mt-6 flow-root ">
        <ul class="space-y-4">
            @forelse(current_user()->follows as $user)
                <li class="{{ $loop->last ? '' : 'mb-6' }} flex items-center space-x-2">
                    <a href="{{ route('explore.show', $user->username) }}">
                        <img class="h-8 w-8 rounded-full" src="{{ $user->avatar }}" alt="">
                    </a>
                    <div class="truncate">
                        <p class="text-sm font-medium text-gray-900">
                                {{ $user->username }}
                            </p>
                        <p class="text-xs font-medium  text-gray-400">
                            {{ $user->email }}
                        </p>
                    </div>
                </li>
            @empty
                <li>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            No friends yet
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>
        <div class="pt-5">
            <x-buttons.large class="bg-red-700 w-full">More</x-buttons.large>
        </div>
    </div>
</div>
