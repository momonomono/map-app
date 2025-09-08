<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get("/", [MainController::class, "top"])->name("top");
Route::get("/create/pin", [MainController::class, "createPin"])->name("create.pin");
Route::get("/create/map", [MainController::class, "createMap"])->name("create.map");



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("slider", [MainController::class, 'slider'])->name('slider');
require __DIR__.'/auth.php';
