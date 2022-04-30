<x-app-layout>
    <div class="py-6">
        @include('posts._header')
        <main class="max-w-5xl px-4 lg:px-0 mx-auto">
            @if ($posts->count())
                <x-posts.grid :posts="$posts" />

                <div class="py-6">
                    {{ $posts->links() }}
                </div>

            @else
                <p class="text-xl font-bold text-red-700 text-center">No posts yet.</p>
            @endif
        </main>
    </div>
</x-app-layout>

