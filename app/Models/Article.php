<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'like_count',
        'view_count',
        'title',
        'map_link',
        'detail',
    ];

     /**
      *  ユーザーとのリレーション
      */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     */
}
