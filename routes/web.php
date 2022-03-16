<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum'])->get('/', function () {
    return redirect()->to('/login');
});

// страниця ошибок на роле
Route::get('/no_access',function (){
    return view('no-access');
});

    Route::resources([
        'manager'=>\App\Http\Controllers\ManagerController::class,
        'user'=>\App\Http\Controllers\UserController::class
    ]);


//отправляем роли на свои страниицы
Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    if(auth()->user()->id==1){

        return redirect()->to('/manager');
    }
    else {
        return view('user');
    }
})->name('dashboard');
