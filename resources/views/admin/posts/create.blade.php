<x-user-layout>
    <x-cards.default>
        <x-slot:header>
            <h3 class="text-lg leading-6 font-medium text-red-700"><i class="fa-solid fa-blog mr-2"></i></i>Add Blogpost</h3>
            <p class="mt-1 text-sm text-gray-500">Create a new BlogPost</p>
        </x-slot:header>

        <livewire:admin.posts.create-post />

    </x-cards.default>
</x-user-layout>
