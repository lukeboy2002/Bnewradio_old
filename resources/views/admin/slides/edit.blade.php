<x-user-layout>
    <x-cards.default>
        <x-slot:header>
            <h3 class="text-lg leading-6 font-medium text-red-700"><i class="fa-brands fa-slideshare mr-2"></i>Edit Slide</h3>
            <p class="mt-1 text-sm text-gray-500">Change Slide</p>
        </x-slot:header>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <x-form.input type="text" name="title" value="{{ $slide->title }}"required />
            <x-form.input type="text" name="subtitle" required />
            <x-form.input type="file" name="image" />

            <x-form.field>
                <div class="flex items-center">
                    <input name="status" type="checkbox" value=1 class="h-4 w-4 text-indigo-600 focus:ring-red-500 border-gray-300 rounded">
                    <label for="status" class="ml-2 block text-sm text-gray-900">Active</label>
                </div>
            </x-form.field>

            <div class="flex justify-end space-x-2">
                <x-buttons.large type="button" onclick="history.back()" class="bg-gray-400">Cancel</x-buttons.large>
                <x-buttons.large class="bg-red-700">Save</x-buttons.large>
            </div>

        </form>

    </x-cards.default>
</x-user-layout>
