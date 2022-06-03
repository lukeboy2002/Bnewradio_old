<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slide;

class Slides extends Component
{
    use WithPagination;

    public $showModal = false;

    public function render()
    {
        $slides = Slide::paginate(10);

        return view('livewire.admin.slides', [
            'slides' => $slides
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Slide::find($this->deleteId)->delete();
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
