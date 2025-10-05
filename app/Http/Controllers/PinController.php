<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleMapHelper;
use App\Http\Requests\PinEditRequest;
use App\Http\Requests\PinFormRequest;
use App\Models\Pin;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // 共有リンクから座標を引っ張ってくる
        $googleMapHelper = new GoogleMapHelper();
        $coord = $googleMapHelper->getCoordinatesFromUrl($data['map_url']);
        if (!$coord) {
            return back()
                ->withErrors(['map_url' => '無効なGoogleマップのURLです。'])
                ->withInput();
        }

        $user_id = Auth::id();
        $pin = new Pin();
        $searchedPin = $pin->searchPin($coord, $user_id);
        if ($searchedPin->count() > 0 ) {
            return back()
                    ->withErrors(['map_url' => '同じピンがすでに存在しています。'])
                    ->withInput();
        }

        $storedPin = $pin->storePin($data, $coord);         
        if ($request->hasFile('images')) { 
            foreach (array_slice($request->file('images'), 0, 3 )as $imageFile) {  
                // 画像をストレージとDBに保存
                $image = new Image();
                $image->storeImage($imageFile, $storedPin->id);
            }
        } 

        return redirect()->route("create.map");
    }


    /**
     *  共有リンク入力後、javascriptで座標を返す
     * 
     * @param Request $request
     * @return 
     */
    public function redialMapUrl(Request $request)
    {
        $url = $request->input('url');

        $googleMapHelper = new GoogleMapHelper();
        $coords = $googleMapHelper->getCoordinatesFromUrl($url);

        return response()->json([
            $coords
        ]);
    }



    /**
     * ピンの削除機能
     * 
     * @param Request
     * @return back
     */
    public function deletePin(Request $request)
    {
        $user_id = Auth::id();
        $pin_id = $request->input('pin_id');
        $pin = Pin::where('id', $pin_id)->first();
        $pin_user_id = $pin->user_id;
        
        if ($user_id !== $pin_user_id) {
            return redirect()->route('create.pin');
        }

        (new Pin())->deletePin($pin_id);
        
        return back();
    }


    /**
     * ピンの編集画面
     * 
     * @param  integer $id
     * @return Illuminate\View\View
     */
    public function editPin($id)
    {
        $user_id = Auth::id();
        $pin = ( new Pin() )->checkEditPin($user_id, $id);
        if (!$pin) {
            return redirect()->route('create.pin');
        }
        return view("pin-edit", compact('pin'));
    }


    /**
     * ピン編集
     * 
     * @param PinEditRequest $request Integer $id
     * @return view
     */ 
    public function updatePin(PinEditRequest $request, $id)
    {   
        $data = $request->validated();
        $pin = Pin::where("id", $id)->first();

        $map_url = $request->input("map_url");        
        $googleMapHelper = new GoogleMapHelper();
        $coord = $googleMapHelper->getCoordinatesFromUrl($map_url);
        if (!$coord) {
            return back()
                    ->withErrors(['map_url' => '無効なGoogleマップのURLです。'])
                    ->withInput();
        }

        $pin = new Pin();
        $searchedPin = $pin->searchPin($coord, $pin->user_id);
        if ($searchedPin->count() > 0) {
            return back()
                ->withErrors(['map_url' => '同じピンがすでに存在しています。'])
                ->withInput();
        }

        $updatedPin = $pin->updatePin($id, $data, $coord);
        if ($request->hasFile('images')) { 
            foreach (array_slice($request->file('images'), 0, 3 )as $imageFile) {  
                // 画像をストレージとDBに保存
                $image = new Image();
                $image->updateImage($id, $imageFile);
            }
        } 
        
        return redirect()->route("create.map");
    }
}
