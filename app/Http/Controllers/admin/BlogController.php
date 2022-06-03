<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')
            ->with([
                'posts' => $posts,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')
            ->with([
                'categories' => $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'category' => 'required',
            'excerpt' => 'required|min:4',
            'body' => 'required|min:6',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:1024', // 1MB Max
        ]);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $post = POST::create([
            'category_id' => $request->category,
            'user_id' => request()->user()->id,
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);

        $request->image->storeAs('images/post', $post->id . '.' . $request->image->extension());

        $post->update(['image' => 'images/post/'.$post->id . '.' . $request->image->extension()]);

        $request->session()->flash('success', 'Permission added successfully');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrfail($id);

        return view('admin.posts.edit')
            ->with([
                'post' => $post,
                'categories' => $categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $previousImagePath = $post->image;

        $this->validate($request, [
            'title' => 'required|max:25',
            'category' => 'required',
            'excerpt' => 'required|min:4',
            'body' => 'required|min:6',
        ]);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $post -> update([
            'category_id' => $request->category,
            'user_id' => request()->user()->id,
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);

        if ($image = $request->file('image')) {
            Storage::delete($previousImagePath);

            $request->image->storeAs('images/post', $post->id . '.' . $request->image->extension());

            $post->update(['image' => 'images/post/'.$post->id . '.' . $request->image->extension()]);

        }else{
            unset($request['image']);
        }

        $request->session()->flash('success', 'Blogpost successfully changed');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $request->session()->flash('success', 'Blogpost successfully deleted');

        return redirect()->route('posts');
    }
}
