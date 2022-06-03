<x-user-layout>
    <x-cards.default>
        <x-slot:header>
            <h3 class="text-lg leading-6 font-medium text-red-700"><i class="fa-brands fa-slideshare mr-2"></i>Edit Slide</h3>
            <p class="mt-1 text-sm text-gray-500">Edit Slide</p>
        </x-slot:header>

        <livewire:admin.slides.slides-edit :slide="$slide" />
    </x-cards.default>
</x-user-layout>
