<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pin extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'latitude',
        'longitude',
        'detail',
        'image1_path',
        'image2_path',
        'image3_path',
    ];
    
    public function maps()
    {
        return $this->belongsToMany(Map::class, 'map_pin')
                    ->withTimestamps();
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_pin')
                    ->withTimestamps();
    }

    public function getPins()
    {
        return self::with('maps')->get();
    }

    /**
     * Pinを保存
     * 
     * @param array $data
     * @param array $coords
     * @return Pin
     */
    public function storePin($data, $coords)
    {
        $pin = Pin::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'latitude' => $coords['lat'],
            'longitude' => $coords['lng'],
            'detail' => $data['detail'] ?? '',
        ]);

        return $pin;
    }
}
