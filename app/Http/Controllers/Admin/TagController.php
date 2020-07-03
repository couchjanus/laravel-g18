<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // правила проверки могут быть указаны
        // строкой с разделителями: | 
        $request->validate([
            'name' => 'required|unique:tags|max:25',
        ]);
        // В качестве альтернативы, правила проверки 
        // могут быть указаны как массивы правил: 
        // $request->validate([
        //     'name' => ['required', 'unique:tags', 'max:25'],
        // ]);

        // можно использовать метод validateWithBag для проверки запроса и 
        // сохранения любых сообщений об ошибках в именованном кейсе ошибок:
        // $validator=$request->validateWithBag('tag', [
        //     'name' => ['required', 'unique:tags', 'max:25'],
        // ]);
        // что позволит получать сообщения об ошибках, передав имя в качестве второго аргумента withErrors:
        // return redirect()->route('admin.tags.index')->withErrors($validator, 'tag');
        // Затем вы можете получить доступ к именованному экземпляру MessageBag из переменной $errors:{{ $errors->tag->first('name') }}

        Tag::create(['name'=>$request->name]);
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
