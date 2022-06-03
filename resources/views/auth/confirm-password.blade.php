<x-app-layout>
    <div x-data="{'isModalOpen': true}" x-on:keydown.escape="isModalOpen=false">
        <div x-show="isModalOpen" x-on:click.away="isModalOpen = true">
            <x-modal>

                <h3 class="text-lg font-medium text-gray-900">Confirm your password</h3>

                <form action="/user/confirm-password" method="POST" class="space-y-6">
                        @csrf
                        <x-form.input type="password" name="password" required />

                        <div>
                            <x-buttons.large class="bg-red-700">Confirm</x-buttons.large>
                        </div>
                    </form>
            </x-modal>
        </div>
    </div>
</x-app-layout>
