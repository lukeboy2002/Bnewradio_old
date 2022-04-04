<div>
    <form wire:submit.prevent="createPost" enctype="multipart/form-data">
        @csrf
        <div class="mt-6 space-y-5 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="w-full">
                <x-form.input wire:model="title" type="text" name="Title" id="name" placeholder="Title.." required />
            </div>

            <div class="w-full">
                <x-form.input wire:model="slug" type="text" name="Slug"/>
            </div>

            <div class="w-full">
                <x-form.textarea wire:model="excerpt" name="Excerpt" placeholder="Write a description..." />
            </div>

            <div class="w-full">
                <x-form.textarea wire:model.defer="body" name="Body" rows="5" placeholder="Write a description..." />
            </div>

{{--            <div class="w-full">--}}
{{--                <label class="block font-medium text-sm text-gray-700" for="description">--}}
{{--                    Body--}}
{{--                </label>--}}
{{--                <div wire:ignore>--}}
{{--                    <textarea name="Body" id="body"></textarea>--}}
{{--                </div>--}}
{{--                @error('post.body')--}}
{{--                <div class="text-sm text-red-500 ml-1">--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="sm:col-span-6">--}}
{{--                <label for="cover-photo" class="block text-sm font-medium text-gray-700"> Cover photo </label>--}}
{{--                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">--}}
{{--                    <div class="space-y-1 text-center">--}}
{{--                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">--}}
{{--                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                        </svg>--}}
{{--                        <div class="flex text-sm text-gray-600">--}}
{{--                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">--}}
{{--                                <span>Upload a file</span>--}}
{{--                                <input id="file-upload" name="file-upload" type="file" class="sr-only">--}}
{{--                            </label>--}}
{{--                            <p class="pl-1">or drag and drop</p>--}}
{{--                        </div>--}}
{{--                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <input type="file" wire:model="image">
            @error('image')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

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

</div>

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create(document.querySelector('#body'))--}}
{{--            .then(editor => {--}}
{{--                editor.model.document.on('change:data', () => {--}}
{{--                @this.set('body', editor.getData());--}}
{{--                })--}}
{{--                Livewire.on('reinit', () => {--}}
{{--                    editor.setData('', '')--}}
{{--                })--}}
{{--            })--}}
{{--            .catch(error => {--}}
{{--                console.error(error);--}}
{{--            });--}}
{{--    </script>--}}
{{--@endpush--}}
