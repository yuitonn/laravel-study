<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルを使用

class DataController extends Controller
{
    public function show()
    {
        // itemsテーブルからすべてのデータを取得
        $items = Item::all();

        // yuito-dataファイルを表示、
        // ルートの名前と混同しないようにね！(この後すぐ出てくるよ)
        // 今回はリンクじゃなくて表示したいファイルの名前を書いてるよ
        // 上の　$items　変数を渡してるよ、これでデータを使えるよ
        return view('yuito-data', ['items' => $items]);
    }
}