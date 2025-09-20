<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

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
        // リダイヤルを許可しない設定でHTTPリクエストを送信
        $response = Http::withOptions(['allow_redirects' => false])->get($shortUrl);

        // ステータスコードが301または302の場合、Locationヘッダーからリダイレクト先のURLを取得
        if (in_array($response->status(), [301, 302])) {
            return $response->header('Location');
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
    public static function extractLatLngFromUrl(string $url): ?array
    {
        // 正規表現を使用して、URLから緯度と経度を抽出
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return [
                'lat' => (float) $matches[1],
                'lng' => (float) $matches[2],
            ];
        }

        // 何もない場合はnullを返す
        return null;
    }
}