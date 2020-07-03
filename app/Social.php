<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'provider', 'provider_id',
    ];

    // Социальный аккаунт принадлежит одному пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
