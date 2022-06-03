<x-cards.default>
    <x-messages />

    <x-slot:header>
        <h3 class="text-lg font-medium text-gray-900">Change your password</h3>
    </x-slot:header>


    <form wire:submit.prevent="changePassword" role="form" class="space-y-6">

        <x-form.input type="password" name="current_password" id="state.current_password" wire:model="state.current_password" required />
        <x-form.input type="password" name="password" id="state.password" wire:model="state.password" required />
        <x-form.input type="password" name="password_confirmation" id="state.password_confirmation" wire:model="state.password_confirmation" required />

        <div class="flex justify-end">
            <x-buttons.default class="bg-red-700">Save</x-buttons.default>
        </div>
    </form>
</x-cards.default>
