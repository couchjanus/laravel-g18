<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\{Post, Category};

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   {
        $posts = Post::where('published', 1)->with('user')->with('category')->simplePaginate(5);
        return view('blog.index', compact('posts'));
    }
     
    public function show($slug)
    {
        if (is_numeric($slug)) {
            $post = Post::findOrFail($slug);
            return redirect(route('blog.show', $post->slug), 301);
        }

        $post = Post::whereSlug($slug)->with('user')->with('category')->firstOrFail();
        $hasComments = false;

        $Key = 'blog' . $post->id;
        if (!\Session::has($Key)) {
            $post->increment('votes');
            \Session::put($Key, 1);
        }
        
        return view('blog.show',compact('post', 'hasComments'));
    }

    public function getByCategory($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()
              ->where('published', 1)
              ->with('user')
              ->with('category')
              ->orderBy('created_at', 'desc')
              ->simplePaginate(7);
        // $categories = DB::table('categories')->take(30)->get();
        return view('blog.index', compact('posts'));
    }

    public function getByAuthor($id)
    {
        $posts = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name', 'users.name As username')
        ->where('user_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('blog.index', compact('posts'));
    }

    public function LikePost(Request $request){
        $post = Post::find($request->id);
        $response = auth()->user()->toggleLike($post);
        return response()->json(['success'=>$response]);
    }
}
