<x-app-layout>
    <x-messages />

    <x-cards.auth>
        <x-slot:heading>Reset your password </x-slot:heading>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-form.input name="email" type="email" value="{{ $request->email }}" autocomplete="email" required />
            <x-form.input name="password" type="password" autocomplete="current-password" required />
            <x-form.input name="password_confirmation" type="password" autocomplete="new-password" required />

            <div>
                <x-buttons.large class="bg-red-700 w-full">Submit</x-buttons.large>
            </div>
        </form>
    </x-cards.auth>
</x-app-layout>
