<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class, 'articles_tags', 'tag_id', 'article_id');
    }
}
