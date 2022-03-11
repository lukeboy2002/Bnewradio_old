<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(){

        $users = User::Paginate(25);
        $roles = Role::all();

        return view('profiles.index')
            ->with([
                'users' => $users,
                'roles' => $roles
            ]);
    }

    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(10),
//            'tweets' => $user->tweets()->paginate(10),
        ]);
    }
}
