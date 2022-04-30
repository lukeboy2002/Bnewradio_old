<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use function view;

class Categories extends Component
{
    public $showModal = false;

    public function render()
    {
        $categories = Category::with('posts')->get();
//        $categories = Category::all();

        return view('livewire.admin.categories', [
            'categories' => $categories
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Category::find($this->deleteId)->delete();
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
