<x-user-layout>
    <x-cards.default>
        <x-slot:header>
            <h3 class="text-lg leading-6 font-medium text-red-700"><i class="fa-solid fa-blog mr-2"></i></i>Add Blogpost</h3>
            <p class="mt-1 text-sm text-gray-500">Create a new BlogPost</p>
        </x-slot:header>

{{--        <livewire:admin.post-create />--}}

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-6 space-y-5 gap-y-6 gap-x-4 sm:grid-cols-6">

                <select name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="p-2 text-red-500 text-xs">
                        {{ $message }}
                    </span>
                @enderror

                <div class="w-full">
                    <x-form.input type="text" name="title" placeholder="Title"  />
                </div>

                <div class="w-full">
                    <x-form.textarea name="excerpt" placeholder="Write a description..." />
                </div>

                <div class="w-full">
                    <x-form.textarea wire:model.defer="body" name="body" id="body" />
                </div>

                <div class="w-full">
                    <x-form.input type="file" name="image"/>
                </div>

            </div>
            <div class="pt-5 flex justify-end space-x-2">
                <x-buttons.default type="button" onclick="history.back()" class="bg-gray-400">Cancel</x-buttons.default>
                <x-buttons.default class="bg-red-700">
                    <svg wire:loading wire.target="createPost" class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 0 1 1 1v2.101a7.002 7.002 0 0 1 11.601 2.566 1 1 0 1 1-1.885.666A5.002 5.002 0 0 0 5.999 7H9a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm.008 9.057a1 1 0 0 1 1.276.61A5.002 5.002 0 0 0 14.001 13H11a1 1 0 1 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-2.101a7.002 7.002 0 0 1-11.601-2.566 1 1 0 0 1 .61-1.276z" clip-rule="evenodd"/>
                    </svg>
                    Post
                </x-buttons.default>

            </div>
        </form>
    </x-cards.default>
    @push('scripts')
        @include('admin.posts.ckeditor')
    @endpush
</x-user-layout>

