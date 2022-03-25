<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComment extends Component
{
    use WithPagination;

    public $post;
    public $comment;
    public $successMessage;

    protected $rules = [
        'comment' => 'required|min:4'
    ];

    public function postComment()
    {
        $this->validate();

        sleep(1);

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => request()->user()->id,
            'body' => $this->comment,
        ]);

        $this->comment = '';

        $this->post = Post::find($this->post->id);

        $this->successMessage = 'Your comment has been added';
    }

    public function render()
    {
        return view('livewire.posts.post-comment');

    }
}
