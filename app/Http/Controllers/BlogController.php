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
        $posts = Post::where('published', 1)->with('user')->with('category')->simplePaginate(7);
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.index', compact('posts', 'categories'));
    }
     
    public function show($id)
    {
        $post = Post::where('id', $id)
        ->with('user')
        ->with('category')
        ->first();
        $hasComments = false;
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.show', compact('post', 'categories', 'hasComments'));
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
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.index', compact('posts', 'categories'));
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
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.index', compact('posts', 'categories'));
    }
}
