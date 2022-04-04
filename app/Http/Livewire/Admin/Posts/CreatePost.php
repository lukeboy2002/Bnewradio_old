<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $excerpt;
    public $body;
    public $image;

    public $successMessage;

    protected $rules = [
        'title' => 'required|max:25',
        'slug' => 'required|max:50',
        'excerpt' => 'required|min:4',
        'body' => 'required|min:6',
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:1024', // 1MB Max
    ];

//    public function mount(){
//        $this->post = new Post;
//    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    public function createPost()
    {
        $this->validate();

        $filename = $this->image->store('/images/post');

        sleep(1);

        POST::create([
            'category_id' => 1,
            'user_id' => request()->user()->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'image' => $filename,
        ]);

        $this->title = '';
        $this->slug = '';
        $this->excerpt = '';
        $this->body = '';

        $this->successMessage = 'Your post has been added';
    }

    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
