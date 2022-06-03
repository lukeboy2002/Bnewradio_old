<?php

namespace App\Http\Livewire\Profiles;

use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileChangeForm extends Component
{
    use WithFileUploads;

    public $avatar;
    public $profileimage;

    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()->withoutRelations()->toArray();
    }

    public function updatedAvatar()
    {
        $previousAvatarPath = auth()->user()->avatar;
//        dd($previousAvatarPath);

        $pathAvatar = $this->avatar->store('images/avatars');

        auth()->user()->update(['avatar' => $pathAvatar]);

        if($previousAvatarPath !== "/images/avatars/user.png") {
            Storage::delete($previousAvatarPath);
        }

        session()->flash('status', 'Your avatar is successfully updated');

        return redirect(route('profiles', current_user()->username));
    }

    public function updatedProfileImage()
    {
        $previousProfileImagePath = auth()->user()->profile_img;
        $pathProfileImage = $this->profileimage->store('images/profiles');

        auth()->user()->update(['profile_img' => $pathProfileImage]);

        if($previousProfileImagePath !== "/images/profiles/default.jpeg") {
            Storage::delete($previousAvatarPath);
        }

        session()->flash('status', 'Your profile image successfully updated');

        return redirect(route('profiles', current_user()->username));
    }


    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'username' => $this->state['username'],
            'firstname' => $this->state['firstname'],
            'lastname' => $this->state['lastname'],
            'jobtitle' => $this->state['jobtitle'],
            'bio' => $this->state['bio'],
            'email' => $this->state['email']
        ]);

        $this->emit('nameChanged', auth()->user()->username);

        session()->flash('status', 'Profile successfully updated');

        return redirect(route('profiles', current_user()->username));
    }


    public function render()
    {
        return view('profiles.profile-change-form');
    }
}
