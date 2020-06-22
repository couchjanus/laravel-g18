<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\{Post, Category};
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::paginate();
        // $posts = Post::paginate(10);
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create(['title'=>$request->title, 'content'=>$request->content, 'category_id'=>$request->category_id, 'user_id'=>1]);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.edit')->withCategories($categories)->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'published'=>($request->published =='on')?1:0,
            ]);
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    // trashed
    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate();
        return view('admin.posts.trashed', compact('posts'));
    }

    public function restore($id)
    {
        Post::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect(route('admin.posts.trashed'));
    }

    public function postDestroy($id)
    {
        $post = Post::withTrashed()
                ->findOrFail($id);
        $post->forceDelete();
        return redirect()->route('admin.posts.index');
    }

    public function force($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();  
        $post->forceDelete();
        return redirect()->route('admin.posts.index');
    }
}
