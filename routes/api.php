<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function (){
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
});
Route::get('/profile', [\App\Http\Controllers\User\HomeController::class, 'profile']);
Route::middleware(['auth:api', 'jwt_check'])->group(function (){

    Route::post('/profiles', [\App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profiles/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profiles/create', fn() => view('profile.create'))->name('profile.create');
    Route::get('/profiles/{id}/edit', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles/{profile}', [\App\Http\Controllers\Admin\ProfileController::class, 'destroy'])->name('profile.delete');

});
