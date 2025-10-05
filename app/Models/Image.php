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
        $image = Image::create([
            'pin_id' => $id,
            'image_path' => $path
        ]);

        return $image;
    }

    public function getUrlAttributes($image)
    {
        return isset($image)
                ? Storage::url($this->image_path)
                : "";
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

            $id = Auth::id();
            // 画像情報をDBに保存
            $image = self::update([
                'pin_id' => $pin_id,
                'image_path' => $path
            ]);
        } 
    }
}
