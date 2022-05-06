<div>
    <x-cards.default>
        <x-slot name="header">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete your account</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            </div>
        </x-slot>

        <x-buttons.default wire:click="deleteId({{ $user->id }})" class="bg-red-700">Delete</x-buttons.default>

    </x-cards.default>

    <!-- Modal -->
    <div class="hidden" @if ($showModal) style="display:block" @endif aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <x-modal>
            <div class="sm:flex sm:items-start">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fa-solid fa-user-slash text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete Role</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 mb-3">
                                Make sure you want to do this.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-5 sm:mt-4 flex justify-end space-x-2">
                <x-buttons.default wire:click="close" class="bg-gray-500" data-dismiss="modal">Close</x-buttons.default>
                <x-buttons.default wire:click.prevent="delete()"  class="bg-red-700">Delete</x-buttons.default>
            </div>
        </x-modal>
    </div>
</div>


