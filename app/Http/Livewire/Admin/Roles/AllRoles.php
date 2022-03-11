<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class AllRoles extends Component
{
    public $showModal = false;

    public function render()
    {
        $roles = Role::all();

        return view('livewire.admin.roles.all-roles', [
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
