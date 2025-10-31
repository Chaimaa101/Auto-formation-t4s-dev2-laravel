<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::latest()->paginate(10);
        // return view('posts', ['posts' => $posts]);
        $posts = Post::all();
        return  $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infos = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'author' => ['required'],
            'status' => ['required'],
        ]);

        $post = $request->user()->posts()->create($infos);

        $tag1 = Tag::create([
            "tag_name" => $request->tag_name
        ]);

        $post->tags()->attach($tag1->id);

        $post->comments()->create([
            "content" => $request->cont
        ]);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('details', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $infos = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'author' => ['required'],
            'status' => ['required'],
        ]);

        $post->update($infos);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
