<x-app-layout>
    <x-messages />

    <x-cards.auth>
        <x-slot:heading>two factor authentication </x-slot:heading>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                Please confirm access to your account by entering one of your emergency recovery codes.
            </div>

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-form.input type="text" name="code" inputmode="numeric" x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-form.input type="text" name="recovery_code" inputmode="numeric" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        Use a recovery code
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="recovery"
                            x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        Use an authentication code
                    </button>

                    <x-buttons.default class="bg-red-700 ml-2">Login</x-buttons.default>
                </div>
            </form>
        </div>
    </x-cards.auth>
</x-app-layout>
