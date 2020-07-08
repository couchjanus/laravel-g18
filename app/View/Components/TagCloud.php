<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Tag;

class TagCloud extends Component
{
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $tags=Tag::all();
        return view('components.tag-cloud')->withTags($tags);
    }
}
