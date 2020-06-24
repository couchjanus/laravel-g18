<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'published'
    ];

    protected $dates = [
        'deleted_at',
    ];

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
}
