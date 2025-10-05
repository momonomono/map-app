<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pin extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'map_url',
        'latitude',
        'longitude',
        'detail',
    ];
    
    public function maps()
    {
        return $this->belongsToMany(Map::class, 'map_pin')
                    ->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getPinsById($id)
    {
        return self::where('user_id', $id)->get();
    }


    /**
     * Pinを保存
     * 
     * @param array $data
     * @param array $coords
     * @return Pin
     */
    public function storePin($data, $coord)
    {
        $pin = self::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'map_url' => $data['map_url'],
            'latitude' => $coord['lat'],
            'longitude' => $coord['lng'],
            'detail' => $data['detail'] ?? '',
        ]);
        return $pin;
    }


    /**
     * 同じピンがあるかどうか調べる
     * 
     * @param array $coords
     * @return Pin
     */
    public function searchPin($coords, $user_id)
    {
        return self::where('latitude', round($coords['lat'], 6))
                ->where('longitude', round($coords['lng'], 6))
                ->where('user_id', $user_id)
                ->get();
    }

    


    /**
     * 編集するピンの出力
     * 
     * @param integer $user_id, $id
     * @return Pin
     */
    public function checkEditPin($user_id, $id)
    {
        return self::with('images')
                    ->where("id", $id)
                    ->where("user_id", $user_id)
                    ->first();
    }


    /**
     * ピンの削除
     * 
     * @param integer $id
     * @return 
     */
    public function deletePin($id)
    {
        self::where('id', $id)->delete();
    }

    public function updatePin($id, $data, $coord)
    {
        return self::findOrFail($id)
                ->update([
                    "title" => $data['title'],
                    "detail" => $data['detail'],
                    "map_url" => $data['map_url'],
                    "latitude" => $coord['lat'],
                    "longitude" => $coord['lng'],
                ]);
    }
}
