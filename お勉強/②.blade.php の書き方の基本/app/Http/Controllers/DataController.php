<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルを使用。データベースを使うにはマイグレーションとモデルってやつを使うよ。

class DataController extends Controller
{
    public function show()
    {
        // itemsモデルからすべてのデータを取得
        $items = Item::all();

        // yuito-dataファイルを表示、
        // ルートの名前と混同しないようにね！(この後すぐ出てくるよ)
        // 今回はリンクじゃなくて表示したいファイルの名前を書いてるよ
        // 上の $items 変数を渡してるよ、これでデータを使えるよ
        return view('yuito-data', ['items' => $items]);
    }
}

//マイグレーションは、init.sql の上の部分と同じで、データベースの構造を定義しているファイルだよ
//モデルは、そのマイグレーションたちの関係性とかをまとめてるものだよ