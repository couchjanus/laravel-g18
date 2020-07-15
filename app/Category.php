<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('blog.by.category', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
