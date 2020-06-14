<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::select('select * from categories');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into categories (name, description, created_at) value(?, ?, ?)', 
            [
                $request['name'], 
                $request['description'],
                Carbon::now('Europe/Kiev')
            ]
        );
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::select('select * from categories where id=?', [$id])[0];
        // dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category = DB::select('select * from categories where id=?', [$id]);
        $category = DB::select('select * from categories where id=?', [$id])[0];
        // dd($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::update('update categories set name=?, description=?, updated_at=?
         where id = ?', [
            $request['name'], 
            $request['description'], 
            Carbon::now('Europe/Kiev'),
            $id
        ]);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from categories where id=?', [$id]);
        return redirect(route('admin.categories.index'));
    }
}
