<x-app-layout>
    <x-messages />

    <x-cards.auth>
        <x-slot:heading>Register your account </x-slot:heading>
        <form action="{{ route('register') }}" method="POST">
        @csrf
            <x-form.input type="text" name="username" required />

            <div class="sm:flex sm:justify-between sm:items-center sm:gap-x-4">
                <x-form.input type="text" name="firstname" />
                <x-form.input type="text" name="lastname" />
            </div>

            <x-form.input type="email" name="email" required />

            <x-form.input type="password" name="password" required />
            <x-form.input type="password" name="password_confirmation" required />

            <div>
                <x-buttons.large class="bg-red-700 w-full">Register</x-buttons.large>
            </div>
        </form>
    </x-cards.auth>
</x-app-layout>
