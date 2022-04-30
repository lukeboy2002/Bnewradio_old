<x-app-layout>
    <x-messages />

    <x-cards.auth>
        <x-slot:heading>Confirm your account </x-slot:heading>

        <p class="text-sm text-gray-500 mb-3">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>

        <div class="flex justify-between items-center">
        <form action="{{ route('verification.send') }}" method="POST" class="space-y-6">
            @csrf
            <x-buttons.large class="w-full bg-blue-500">Resend verification link</x-buttons.large>
        </form>

        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <x-buttons.large class="w-full bg-red-700">Logout</x-buttons.large>
        </form>
        </div>
    </x-cards.auth>
</x-app-layout>
