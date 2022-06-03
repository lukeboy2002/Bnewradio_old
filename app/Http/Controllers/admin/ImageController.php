<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store()
    {
        $task = new Post();
        $task->id = 0;
        $task->exists = true;
        $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb')
        ]);
    }
}
