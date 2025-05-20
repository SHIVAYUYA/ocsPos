<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;  // Productモデルを追加でインポート

class StoreAdminController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        // フォーム用にクラス名と教室を抽出
        $classes = Store::select('class_name')->distinct()->pluck('class_name');
        $classrooms = Store::select('classroom')->distinct()->pluck('classroom');

        $products = Product::all();  // productsを取得してビューに渡す

        return view('admin.store', compact('stores', 'classes', 'classrooms', 'products'));
    }
}
