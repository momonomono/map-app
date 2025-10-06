<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class GoogleMapHelper
{
    /**
     * 短縮URLを展開してリダイレクト先のURLを取得
     *
     * @param string $shortUrl
     * @return string|null
     */
    public static function expandGoogleMapsUrl(string $shortUrl): ?string
    {
        try {
            // リダイヤルを許可しない設定でHTTPリクエストを送信
            $response = Http::withOptions(['allow_redirects' => false])->get($shortUrl) ?? "";
    
            // ステータスコードが301または302の場合、Locationヘッダーからリダイレクト先のURLを取得
            if (in_array($response->status(), [301, 302])) {
                return $response->header('Location');
            }
        } catch(\Throwable $e) {
            Log::error("Google Maps URL expand failed: " . $e->getMessage());
        }

        // 何もない場合はnullを返す
        return null;
    }


    /**
     * GoogleマップのURLから緯度と経度を抽出
     *
     * @param string $url
     * @return array|null
     */
    public static function extractCoordinatesFromUrl(string $url): ?array
    {
        $place = null;
        $lat = null;
        $lng = null;

        if (preg_match('#/place/([^/]+)#', $url, $matches)) {
            $place = $matches[1];
        }

        // 正規表現を使用して、URLから緯度と経度を抽出
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            $lat = $matches[1];
            $lng = $matches[2];
        }
        
        return [
            'place' => $place,
            'lat' => $lat,
            'lng' => $lng
        ];
    }

    public function getCoordinatesFromUrl($url)
    {
        $expanded = self::expandGoogleMapsUrl($url);

        if ($expanded) {
            $coords = self::extractCoordinatesFromUrl($expanded);
            return $coords;
        } 

        return null;
    }
}