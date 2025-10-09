<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'detail',
    ];

    public function pins()
    {
        return $this->belongsToMany(Pin::class, "map_pin")
                    ->withTimestamps();
    }

    // ピンのリレーション
    public function getPins()
    {
        return self::with('pins')->get();
    }

    /**
     * マップの登録
     * 
     * @param Integer $user_id , Map $map
     * @return 
     */
    public function storeMap($user_id, $map)
    {
        $storedMap = self::create([
            'user_id' => $user_id,
            'title' => $map['title'],
            'detail' => $map['detail'] ?? ""
        ]);

        $storedMap->pins()->attach($map['pins']);
    }


    /**
     * マップのカードの表示する画像をランダムで５枚表示する
     * ピンに紐づけている画像を抽出
     * 
     * @param Map $maps, Integer $num 
     * @return Map $maps
     */
    public function getImageTake($maps, $num)
    {
        foreach($maps as $map){
            $allImage = $map->pins->flatMap( function($pin){
                return $pin->images;
            });
            $map->randomImage = $allImage->shuffle()->take($num);
        }

        return $maps;
    }

    /**
     * マップの削除処理
     * 
     * @param Integer $id
     * @return 
     */
    public function deleteMap($id)
    {
        self::where("id", $id)->delete();
    }
}
