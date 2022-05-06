<?php

namespace App\Http\Livewire\Profiles;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public $showModal = false;

    public function render()
    {
        $user = current_user();

        return view('livewire.profiles.delete-user', [
            'user' => $user
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        User::find($this->deleteId)->delete();

        return redirect()->to('/')->with('success', 'Your account has been deleted');
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
