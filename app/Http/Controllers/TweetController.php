<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => current_user()->timeline()
        ]);

    }

    public function store(Tweet $tweet, Request $request)
    {
        request()->validate([
            'Btweet' => 'required|max:255'
        ]);

        $tweet->create([
            'user_id' => request()->user()->id,
            'tweet' => request('Btweet')
        ]);

        $request->session()->flash('success', 'Your tweet has been added');

        return back();
    }
}
