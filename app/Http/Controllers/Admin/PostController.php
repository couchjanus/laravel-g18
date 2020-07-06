<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\{Post, Category, Tag};
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title'=>$request->title, 
            'content'=>$request->content, 
            'category_id'=>$request->category_id, 
            'user_id'=>1,
            'cover_path' => $this->uploadCover($request->file("cover")),
            // 'cover_path' => $this->uploadImage($request->file("cover")),
        ]);
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.posts.index')->withSuccess('Post Created Successfully');
    }

    private function uploadCover(UploadedFile $file) : string
    {
        $filename = time() . "." . $file->getClientOriginalExtension();
        $file->storeAs("public/covers", $filename);
        return asset("storage/covers/". $filename);
    }

    public function uploadImage(UploadedFile $file) : string
    {
        $filename = time() . "." . $file->getClientOriginalExtension();
        $img = Image::make($file);
        $img->resize(520, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/public/covers')."/".$filename);
        return asset("storage/covers/". $filename);
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
        $post->load('tags');
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.posts.edit')->withCategories($categories)->withTags($tags)->withPost($post);
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
        $data = [
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'published'=>($request->published =='on')?1:0,
        ];

        if($request->file("cover")) {
            Storage::delete("public/covers/" . $post->cover);
            $data += ["cover_path" => $this->uploadImage($request->file("cover"))]; 
        } else {
            $data += ["cover_path" => $post->cover_path]; 
        }

        $post->update($data);

        $post->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.posts.index')->with('message','Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        Storage::delete("public/covers/{$post->cover}");
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','Post deleted successfully');
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
