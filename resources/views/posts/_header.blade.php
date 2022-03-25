<header class="max-w-5xl mx-auto text-center mb-10">

    <h1 class="text-4xl flex justify-center items-center">
        <x-logo_small /> <span class="ml-4">Latest News</span>
    </h1>

    <div class="sm:flex items-center justify-end mt-8">
        <x-category-dropdown />

        <!-- Search -->
        <div class="relative flex inline-flex items-center rounded-xl px-3 pt-3 sm:pt-0">
            <div class="relative flex items-center">
                <form method="GET" action="#">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                <input type="text"
                       name="search"
                       id="search"
                       class="shadow-sm focus:ring-red-700 focus:border-red-500 block max-w-32 pr-12 text-sm border-gray-300 rounded-md"
                       placeholder="Find something"
                       value="{{ request('search') }}"
                    >

                    <div class="absolute inset-y-0 right-0 flex items-center py-1.5 pr-1.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM2 8a6 6 0 1 1 10.89 3.476l4.817 4.817a1 1 0 0 1-1.414 1.414l-4.816-4.816A6 6 0 0 1 2 8z"
                                  clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                </form>
            </div>
        </div>

    </div>
</header>
