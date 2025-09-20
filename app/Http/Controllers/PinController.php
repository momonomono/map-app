<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleMapHelper;
use App\Http\Requests\PinFormRequest;
use App\Models\Pin;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PinController extends Controller
{
    /**
     * Pin投稿画面を表示
     * 
     * @param 
     * @return \Illuminate\View\View
     */
    public function createPin()
    {
        return view("pin");
    }

    /**
     * Pin投稿を保存
     * 
     * @param PinFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePin(PinFormRequest $request)
    {
        // バリデーション済みデータを取得
        $data = $request->validated();

        // GoogleマップのURLを展開して緯度経度を抽出
        $response = Http::withOptions(['allow_redirects' => false])->get($data['map_url']);
        
        // MAP URLからリダイアル先のURLを取得
        $expanded = GoogleMapHelper::expandGoogleMapsUrl($request->map_url);
        
        // リダイアル先のURLが取得できた場合
        if ($expanded) {
            // 正規表現で緯度経度を抽出
            $coords = GoogleMapHelper::extractLatLngFromUrl($expanded);

            // 抽出できた場合
            if ($coords) {
                // Pinを保存
                $pin = new Pin();
                $storedPin = $pin->storePin($data, $coords);

                if ($request->hasFile('images')) {
                    foreach (array_slice($request->file('images'), 0, 3 )as $imageFile) {

                        // 画像をストレージとDBに保存
                        $image = new Image();
                        $storedImage = $image->storeImage($imageFile);
                        
                        // 中間テーブルに保存
                        $storedPin->images()->attach($storedImage->id);
                    }
                } 
            } else {
                return back()->withErrors(['map_url' => '無効なGoogleマップのURLです。']);
            }
        } else {
            return back()->withErrors(['map_url' => 'Googleマップの短縮URLを展開できませんでした。']);
        }

        return redirect()->route("top");
    }
}
