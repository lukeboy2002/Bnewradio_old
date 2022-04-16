<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use function view;

class Roles extends Component
{
    public $showModal = false;

    public function render()
    {
//        $roles = Role::all();
        $roles = Role::with('permissions')->get();

        return view('livewire.admin.roles', [
            'roles' => $roles
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Role::find($this->deleteId)->delete();
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
