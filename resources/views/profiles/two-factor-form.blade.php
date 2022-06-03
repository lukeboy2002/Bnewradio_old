<x-cards.default>
    <x-messages />

    <x-slot:header>
        <h3 class="text-lg font-medium text-gray-900">Two Factor Authentication</h3>
    </x-slot:header>

    <div class="space-y-6">
        @if (!empty($this->user->two_factor_secret)) @if ($showQrCode)
            <p>
                Two factor authentication is now enabled. Scan the following QR code using your
                phone's authenticator application.
            </p>

            <div>
                {!! $this->user->twoFactorQrCodeSvg() !!}
            </div>
        @endif
        @if ($showRecoveryCodes)
            <p>
                Store these recovery codes in a secure password manager. They can be used to
                recover access to your account if your two factor authentication device is lost.
            </p>

            <div class="space-y-1 p-4 bg-gray-100 rounded-xl">
                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>
        @else
            <h3 class="text-md font-medium text-green-600">You have enabled two factor authentication.</h3>
        @endif
        <div class="mt-4 flex justify-end space-x-2">
            @if ($showRecoveryCodes)
                <x-buttons.default wire:click="regenerateRecoveryCodes" class="bg-gray-500">Regenerate Recovery Codes</x-buttons.default>
            @else
                <x-buttons.default wire:click="showRecoveryCodes" class="bg-gray-500">Show Recovery Codes</x-buttons.default>
            @endif
            <x-buttons.default wire:click="disableTwoFactorAuth" class="bg-red-700">Disable Two-Factor Authentication</x-buttons.default>
        </div>

        @else
            <div class="space-y-6">
                <h3 class="text-md font-medium text-red-700">You have not enabled two factor authentication.</h3>
                <p class="text-sm text-gray-600">When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.</p>
                <div class="flex justify-end">
                    <x-buttons.default wire:click="enableTwoFactorAuth" class="bg-green-700">Enable Two-Factor Authentication</x-buttons.default>
                </div>
            </div>
        @endif
    </div>
</x-cards.default>
