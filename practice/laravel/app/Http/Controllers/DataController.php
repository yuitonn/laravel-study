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
        return view('yuito-data', ['items' => $items]);
    }
}