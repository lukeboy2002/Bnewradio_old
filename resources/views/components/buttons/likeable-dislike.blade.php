<div class="flex space-x-6">
    <form method="POST" action="/tweets/{{ $tweet->id }}/like">
        @csrf
        <span class="inline-flex items-center text-sm">
            <button type="submit" class="inline-flex space-x-2 hover:text-gray-500">
                <svg class="h-5 w-5 text-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zm4-.167v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                </svg>
                <span class="font-medium {{ $tweet->IsLikedBy(current_user()) ? 'text-green-700' : 'text-gray-400' }}">{{ $tweet->likes ?: 0 }}</span>
                <span class="sr-only">likes</span>
            </button>
        </span>
    </form>
    <form method="POST" action="/tweets/{{ $tweet->id }}/like">
        @csrf
        @method('DELETE')
        <span class="inline-flex items-center text-sm">
            <button type="submit" class="inline-flex space-x-2 hover:text-gray-500">
                <svg class="h-5 w-5 text-red-700" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="currentColor">
                    <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zm-4 .167v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z"/>
                </svg>
                <span class="font-medium {{ $tweet->IsDisLikedBy(current_user()) ? 'text-red-700' : 'text-gray-400' }}">{{ $tweet->dislikes ?:0 }}</span>
                <span class="sr-only">Dislikes</span>
            </button>
        </span>
    </form>
</div>
