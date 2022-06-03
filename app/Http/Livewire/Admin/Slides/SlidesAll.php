<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class SlidesAll extends Component
{
    use WithPagination;

    public $showModal = false;

    public function render()
    {
        return view('livewire.admin.slides.slides-all', [
            'slides' => Slide::orderby('id', 'desc')->paginate(10)
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        $slide = Slide::find($this->deleteId);
        $image = $slide->image;

        Storage::delete($image);

        $slide -> delete();
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
