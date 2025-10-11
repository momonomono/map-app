<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapFormRequest;
use App\Models\Map;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    protected $user_id;
    protected $map;

    public function __construct(Map $map)
    {
        $this->user_id = Auth::id();
        $this->map = $map;
    }

    /**
     * Map投稿画面を表示
     * 
     * @param 
     * @return \Illuminate\View\View
     */
    public function createMap()
    {
        $pins = (new Pin())->getPinsById($this->user_id);   
        return view("map", compact('pins'));
    }


    /**
     * Map投稿処理
     * 
     * @param MapFormRequest $request
     * @return redirect
     */
    public function storeMap(MapFormRequest $request)
    {
        $validatedMap = $request->validated(); 
        $this->map->storeMap($this->user_id, $validatedMap);

        return redirect()->route('top');
    }

    /**
     * 投稿一覧画面
     * 
     * @param 
     * @return View
     */
    public function mypost()
    {
        $maps = Map::where('user_id', $this->user_id)->get();
        $this->map->getImageTake($maps, 5);

        return view('mypost', compact('maps'));
    }

    /**
     * マップの削除
     * 
     * @param Request $request
     * @return View
     */
    public function deleteMap(Request $request)
    {
        $id = $request->input('id');
        $mapForDelete = Map::where("id", $id)->first();
        $map_user_id =  $mapForDelete->user_id;
        
        if ($this->user_id == $map_user_id) {
            $this->map->deleteMap($id);
            return redirect()->route('top');
        }

        return back();
    }
}
