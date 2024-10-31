<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DataController;
// このコントローラー使うよって設定する必要があるよ


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/yuito', function(){
    return view('yuito');
})->name('home');


// これはコントローラーを通したルートの書き方だよ、直接ファイルを表示させるんじゃなくて、一旦コントローラーに飛ばしているよ
Route::get('/yuito-data', [DataController::class, 'show']);


// コントローラーの名前は、DataController, メソットの名前は'show'
// このコントローラーに飛ばして、そのコントローラーの中の show っていうやつやってねってこと
// ここに真似して書いてみよう。コントローラーとメゾットは全く同じやつ使っていいよ






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
