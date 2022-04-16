<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class Posts extends Component
{
    use WithPagination;

    public $showModal = false;

    public function render()
    {
//        $posts = Post::paginate(5);
        $posts = Post::with('user')->paginate(5);

        return view('livewire.admin.posts', [
            'posts' => $posts
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Post::find($this->deleteId)->delete();
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
