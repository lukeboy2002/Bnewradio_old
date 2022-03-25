<div class="flex items-start space-x-4 bg-white rounded-lg mb-4">
    <div class="min-w-0 flex-1">
        <form wire:submit.prevent="postTweet" class="relative">
            @csrf
            <div class="border border-gray-300 rounded-lg overflow-hidden shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700">
                <x-form.textarea wire:model.defer="tweet" name="tweet" placeholder="Btweet here" required/>

                <div class="flex justify-between items-center py-2 p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <img class="h-10 w-10 rounded-full" src="{{ current_user()->avatar }}" alt="Your Avatar">
{{--                            <x-buttons.icon class="text-gray-500 ml-2">--}}
{{--                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                                <span class="sr-only">Attach a file</span>--}}
{{--                            </x-buttons.icon>--}}
                    </div>
                    <x-buttons.default class="bg-red-700">
                        <svg wire:loading wire.target="postComment" class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 0 1 1 1v2.101a7.002 7.002 0 0 1 11.601 2.566 1 1 0 1 1-1.885.666A5.002 5.002 0 0 0 5.999 7H9a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm.008 9.057a1 1 0 0 1 1.276.61A5.002 5.002 0 0 0 14.001 13H11a1 1 0 1 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-2.101a7.002 7.002 0 0 1-11.601-2.566 1 1 0 0 1 .61-1.276z" clip-rule="evenodd"/>
                        </svg>
                        Btweet
                    </x-buttons.default>
                </div>
            </div>
        </form>
    </div>
</div>


