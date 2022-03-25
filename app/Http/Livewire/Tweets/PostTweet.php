<?php

namespace App\Http\Livewire\Tweets;

use App\Models\Tweet;
use Livewire\Component;

class PostTweet extends Component
{
    public $tweet;

    protected $rules = [
        'tweet' => 'required|max:255',
//        'photo' => 'nullable|sometimes|image|max:5000',
    ];

    public function postTweet()
    {
        $this->validate();

        sleep(1);

        Tweet::create([
            'user_id' => request()->user()->id,
            'body' => $this->tweet,
        ]);

        $this->tweet = '';

//        $this->post = Post::find($this->post->id);
//
//        $this->successMessage = 'Your comment has been added';
    }

    public function render()
    {
        return view('livewire.tweets.post-tweet');
    }
}
