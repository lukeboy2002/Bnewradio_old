<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;

    public $showModal = false;

    public function render()
    {
        $posts = Post::paginate(5);

        return view('livewire.admin.posts.all-posts', [
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
