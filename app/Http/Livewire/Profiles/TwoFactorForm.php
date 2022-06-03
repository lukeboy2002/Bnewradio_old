<?php

namespace App\Http\Livewire\Profiles;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Livewire\Component;

class TwoFactorForm extends Component
{
    public $showQrCode = false;
    public $showRecoveryCodes = false;

    public function showRecoveryCodes()
    {
        $this->showRecoveryCodes = true;
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function enableTwoFactorAuth(EnableTwoFactorAuthentication $enable)
    {
        $enable(Auth::user());

        $this->showQrCode = true;
        $this->showRecoveryCodes = true;
    }

    public function disableTwoFactorAuth(DisableTwoFactorAuthentication $disable)
    {
        $disable(Auth::user());
    }

    public function regenerateRecoveryCodes(GenerateNewRecoveryCodes $generate)
    {
        $generate(Auth::user());

        $this->showRecoveryCodes = true;
    }

    public function render()
    {
        return view('profiles.two-factor-form');
    }
}
