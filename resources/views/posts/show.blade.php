<x-app-layout>
    <main class="max-w-4xl mx-auto py-6">
        <div class="hidden lg:flex justify-between mb-6">
            <a href="/posts"
               class="transition-colors duration-300 relative inline-flex items-center text-lg text-red-700 hover:underline focus:outline-none focus:underline">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.707 4.879A3 3 0 0 1 8.828 4H15a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H8.828a3 3 0 0 1-2.12-.879l-4.415-4.414a1 1 0 0 1 0-1.414l4.414-4.414zm4 2.414a1 1 0 0 0-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 1 0 1.414 1.414L12 11.414l1.293 1.293a1 1 0 0 0 1.414-1.414L13.414 10l1.293-1.293a1 1 0 0 0-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd"/>
                </svg>
                Back to Posts
            </a>
            <x-badges.category :category="$post->category" />
        </div>

        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Blog image" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published: {{ $post->created_at->diffForHumans() }}
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img class="h-14 w-14 rounded-full" src="{{ $post->author->avatar }}" alt="Avatar">
                    <div class="ml-3 text-left">
                        <a href="{{ route('explore.show', $post->author->username) }}" class="font-bold">{{ $post->author->username }}</a>
                        <p class="text-xs text-gray-400">
                            @if ($post->author->jobtitle > 1)
                                {{ $post->author->jobtitle }} |
                            @endif
                            {{ $post->author->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10 text-red-700">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4">
                    {!! $post->body !!}
                </div>
            </div>

            <livewire:posts.post-comment :post="$post" />
        </article>
    </main>
</x-app-layout>
