<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// 今はデータベースとか使わないから、表示させるためだけのシンプルな書き方だよ

// 上の /yuito の部分がリンクになるよ。http://localhost:8080/yuito
// ('yuito')　これが表示させたいファイルの名前だよ。yuito.blade.php　が表示されるよ

// ->name('home');　ここでこのルートに対して名前をつけられるよ！このリンクを<a>で呼びたい時とか使う

//　これみたいな感じで、リンク　と　ファイル　の設定をしたのスペースに書いてみよう






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
