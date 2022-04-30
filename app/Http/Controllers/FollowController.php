<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user, Request $request)
    {
        current_user()->toggleFollow($user);

        return back();
    }
}
