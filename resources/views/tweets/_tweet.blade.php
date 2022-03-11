<div class="p-4 {{ $loop->last ? '': 'border-b border-gray-50' }}">
    <a href="{{ route('explore.show', $tweet->user) }}">
        <div class="flex space-x-3">
            <img class="h-10 w-10 rounded-full" src="{{ $tweet->user->avatar }}" alt="">
            <div class="min-w-0 flex-1">
                <p class="text-sm font-medium text-gray-900">
                    {{ $tweet->user->username }}
                </p>
                <p class="text-sm text-gray-500">
                    {{ $tweet->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </a>
    <div class="mt-2 text-sm text-gray-700 space-y-4">
        <p>{{ $tweet->body }}</p>
    </div>
    <div class="mt-6 flex justify-between space-x-8">
        <x-buttons.likeable-dislike :tweet="$tweet" />
        <div class="flex text-sm">
            {{--                <span class="inline-flex items-center text-sm">--}}
            {{--                    <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">--}}
            {{--                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
            {{--                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />--}}
            {{--                        </svg>--}}
            {{--                        <span class="font-medium text-gray-700">Share</span>--}}
            {{--                    </button>--}}
            {{--                </span>--}}
        </div>
    </div>
</div>
