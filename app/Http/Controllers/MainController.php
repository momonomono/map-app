<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * トップページを表示
     *
     * @param 
     * @return \Illuminate\View\View
     */
    public function top()
    {
        // 表示するカードのために、画像を取得
        $maps = Map::with('pins')
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
        (new Map())->getImageTake($maps, 5);
        
        return view("top",compact('maps'));
    }

    /**
     * マップの詳細画面
     * 
     * @param integer $id
     * @return View
     */
    public function showMap($id)
    {
        // マップのユーザーを取得
        $map = Map::findOrFail($id);
        $user_id = Auth::id();
        $map_user_id = $map->user_id;

        // 削除ボタンの有無のフラグを取得
        $flg = $user_id === $map_user_id;
        
        return view("detail", compact('map', 'flg'));
    }


    /**
     * javascriptによる
     * マップの一覧で表示するカードの画像処理のため
     * 
     * @param Request $request
     * @return $response
     */
    public function getDetail(Request $request)
    {
        $id = $request->input('id');
        $maps = Map::with('pins')
                    ->where("id", $id)
                    ->first();
        $pins = $maps->pins;
        return response()->json($pins);
    }

    /**
     * マップの検索
     * 
     * @param Request $request
     * @return View
     */
    public function searchMap(Request $request)
    {
        // 検索ワード
        $keyword = $request->input('keyword');

        // タイトルまたは詳細から検索ワードが含まれるものを抽出
        $maps = Map::with('pins')
                    ->where('title', 'like', "%{$keyword}%")
                    ->orWhere('detail', 'like', "%{$keyword}%")
                    ->paginate(30);

        // ピンに登録した画像を５枚ランダムで取得
        (new Map())->getImageTake($maps, 5);

        return view("list", compact('maps', 'keyword'));
    }
}
