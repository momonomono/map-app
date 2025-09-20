<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_path',
    ];

    public function pins()
    {
        return $this->belongsToMany(Pin::class, 'image_pin')
                    ->withTimestamps();
    }

    /**
     * 画像を保存
     * 
     * @param \Illuminate\Http\UploadedFile $imageFile
     * @return Image
     */
    public function storeImage($imageFile)
    { 
        // 開発環境に合わせて保存先を変更
        $disk = app()->environment('production') ? 's3' : 'public';
        $path = $imageFile->store('images', $disk);

        // 画像情報をDBに保存
        $image = Image::create([
            'image_path' => $path
        ]);

        return $image;
    }
}
