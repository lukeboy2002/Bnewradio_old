<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AllUsers extends Component
{
    use WithPagination;

    public $showModal = false;
    public $search;

    public function mount()
    {
        $this->search = '';
    }

    public function render()
    {
        $users = User::when($this->search != '', function($query) {
            $query->where('username', 'like', '%'.$this->search.'%');
        })
            ->paginate(10);

        return view('livewire.admin.users.all-users', [
            'users' => $users
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
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
