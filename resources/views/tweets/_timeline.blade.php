    @forelse( $tweets as $tweet)
        @include('tweets._tweet')
    @empty
        <p class="text-red-700 p-4">no tweets yet</p>
    @endforelse

    <div class="p-4">
        {{ $tweets->links() }}
    </div>
