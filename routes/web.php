<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PinController;

Route::middleware('auth')->group(function () {
    // プロフィール画面
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ピン登録画面
    Route::get("/post/pin", [PinController::class, "createPin"])->name("create.pin");
    Route::post("/post/pin", [PinController::class, "storePin"])->name("store.pin");

    // ピン編集画面
    Route::get("/edit/pin/{id}", [PinController::class, "editPin"])->name("edit.pin");
    Route::put("/edit/pin/{id}", [PinController::class, "updatePin"])->name("update.pin");

    // マップ登録画面
    Route::get("/post/map", [MapController::class, "createMap"])->name("create.map");
    Route::post("/post/map", [MapController::class, "storeMap"])->name("store.map");

    // マップ編集画面
    Route::get("/edit/map", [MapController::class, "editMap"])->name("edit.map");
    Route::post("/edit/map", [MapController::class, "updateMap"])->name("update.map");

    Route::get("/mypost", [MapController::class, "mypost"])->name("mypost");

    // Googleマップのリダイアル処理
    Route::post("/pins", [PinController::class, "redialMapUrl"])->name("api.pins");

    // ピン削除処理
    Route::post("/delete/pin", [PinController::class, "deletePin"])->name("delete.pin");
    Route::post("/delete/map", [MapController::class, "deleteMap"])->name('delete.map');
});

// トップページ
Route::get("/", [MainController::class, "top"])->name("top");

Route::get("/post/{id}", [MainController::class, "showMap"])->name("show.map");
Route::post("/post/detail", [MainController::class, "getDetail"])->name("api.detail");

Route::get("/search/{keyword?}", [MainController::class, "searchMap"])->name("search.map");

Route::get("slider", [MainController::class, 'slider'])->name('slider');
require __DIR__.'/auth.php';
