<div class="col-span-8 col-start-5 mt-8 space-y-4">
    @auth
        <form wire:submit.prevent="PostComment" class="border border-gray-200 p-4 rounded-xl">
            @csrf
            <header class="flex items-center">
                <img class="h-10 w-10 rounded-full" src="{{ current_user()->avatar }}" alt="Avatar">
                <h2 class="ml-3">Want to participate</h2>
            </header>
            <div class="mt-4">
                <x-form.textarea wire:model.defer="comment" name="Comment" rows="3" placeholder="Write your comment" required />
            </div>
            <footer class="flex justify-end mt-4">
                <x-buttons.default class="bg-red-700">
                    <svg wire:loading wire.target="postComment" class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 0 1 1 1v2.101a7.002 7.002 0 0 1 11.601 2.566 1 1 0 1 1-1.885.666A5.002 5.002 0 0 0 5.999 7H9a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm.008 9.057a1 1 0 0 1 1.276.61A5.002 5.002 0 0 0 14.001 13H11a1 1 0 1 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-2.101a7.002 7.002 0 0 1-11.601-2.566 1 1 0 0 1 .61-1.276z" clip-rule="evenodd"/>
                    </svg>
                    Post
                </x-buttons.default>
            </footer>
        </form>
    @else
        <div class="flex justify-end">
            <div class="pt-4 text-red-700 font-semibold text-sm">
                <a href="{{ route('register') }}" class="hover:underline">Register</a> or <a href="{{ route('login') }}" class="hover:underline">Login</a> to leave a comment
            </div>
        </div>
    @endauth

    @if ($successMessage)
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             class="fixed bg-green-100 text-white py-2 px-4 rounded-xl top-3 right-3 text-sm z-50"
        >
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">
                        Success
                    </h3>
                    <div class="mt-2 text-sm text-green-700">
                        <p>
                            {{ $successMessage }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($post->comments->reverse() as $comment)
        <x-cards.default>
            <article class="flex space-x-4">
                <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatar }}" alt="Avatar">

                <div>
                    <header class="mb-4">
                        <h3 class="font-bold">{{ $comment->user->username }}</h3>

                        <p class="text-xs text-gray-400">
                            Posted
                            {{ $comment->created_at->diffForHumans() }}
                        </p>
                    </header>

                    <p class="text-sm text-gray-600">
                        {{ $comment->body }}
                    </p>
                </div>
            </article>
        </x-cards.default>
    @endforeach
    <div class="px-4 py-4">
{{--        {{ $posts->links() }}--}}
    </div>

</div>
