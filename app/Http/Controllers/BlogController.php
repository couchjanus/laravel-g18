<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name', 'users.name As username')
        ->orderBy('created_at', 'desc')
        ->paginate();
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name', 'users.name As username')
        ->where('posts.id', $id)
        ->first();
        $hasComments = false;
        $categories = DB::table('categories')->take(30)->get();
        return view('blog.show', compact('post', 'categories', 'hasComments'));
    }

    public function getByCategory($id)
    {
        $posts = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name', 'users.name As username')
        ->where('category_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->get();
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
