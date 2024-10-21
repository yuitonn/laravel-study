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

Route::get('/yuito-data', [DataController::class, 'show']);


// ここでまずコントロールに飛ばして、さっきみたいにリンクとファイルを繋げる
Route::get('/yuito-data2', [DataController::class, 'show2'])->name('yuito.form');
// ここでが　post　されたときにコントローラーの store が行われる
Route::post('/yuito-form', [DataController::class, 'store'])->name('yuito.store');
// このルートは名前をつけておくことで、呼び出しやすくなっている


// 使うメソットとコントローラーは全く同じで、自分のファイルとリンクでやってみ↓↓↓






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
