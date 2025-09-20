<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'title',
        'detail',
        'image1_path',
        'image2_path',
        'image3_path',
    ];

    public function pins()
    {
        return $this->belongsToMany(Pin::class);
    }

    public function getPins()
    {
        return self::with('pins')->get();
    }
}
