<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Comment;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Searchable
{
    use SoftDeletes;
    use Sluggable;
    use Likeable;

    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'published', 'cover_path'
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function tags() {
		return $this->belongsToMany(Tag::class);	
    }
    
    public function getDescriptionAttribute()
    {
        return substr($this->content, 0, 70) . "...";
    }

    public function getShortTitleAttribute()
    {
        return substr($this->title, 0, 27);
    }

    public function getCoverAttribute()
    {
        $parts = explode("/", $this->cover_path);

        return end($parts);
    }
    
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->with('creator')->whereNull('parent_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('blog.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

}
