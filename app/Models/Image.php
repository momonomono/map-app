<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'pin_id',
        'image_path',
    ];

    protected $appends = ['url'];

    public function pins()
    {
        return $this->belongsToMany(Pin::class, 'image_pin');
    }

    /**
     * 画像を保存
     * 
     * @param \Illuminate\Http\UploadedFile $imageFile
     * @return Image
     */
    public function storeImage($imageFile, $id)
    { 
        // 開発環境に合わせて保存先を変更
        $disk = app()->environment('production') ? 's3' : 'public';
        $path = $imageFile->store('images', $disk);

        // 画像情報をDBに保存
        return Image::create([
            'pin_id' => $id,
            'image_path' => $path
        ]);
    }

    // アクセサ
    public function getUrlAttribute()
    {
        $disk = app()->environment('production') ? 's3' : 'public';

        return $this->image_path
            ? Storage::disk($disk)->url($this->image_path)
            : '';
    }

    public function getImagePath($id)
    {
        return self::findOrFail($id)->image_path;
    }

    public function updateImage($pin_id, $image)
    {
        if ($image) {
            $disk = app()->environment('production') ? 's3' : 'public';
            $path = $image->store('images', $disk);

            // 画像情報をDBに保存
            $image = self::update([
                'pin_id' => $pin_id,
                'image_path' => $path
            ]);
        } 
    }
}
