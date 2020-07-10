<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return mixed
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /** 
     * Получить владельца полиморфного отношения 
     * от полиморфной модели, получив доступ к имени метода, 
     * который вызывает morphTo()
     * @return mixed
    **/

    public function creator(): MorphTo
    {
        return $this->morphTo('creator');
    }
    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
