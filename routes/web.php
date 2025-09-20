<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PinController;

Route::get("/", [MainController::class, "top"])->name("top");

Route::get("/post/map", [MapController::class, "createMap"])->name("create.map");
Route::get("/list", [MainController::class, "list"])->name("list");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/post/pin", [PinController::class, "createPin"])->name("create.pin");
    Route::post("/post/pin", [PinController::class, "storePin"])->name("store.pin");

    Route::get("/post/map", [MapController::class, "createMap"])->name("create.map");
});


Route::get("slider", [MainController::class, 'slider'])->name('slider');
require __DIR__.'/auth.php';
