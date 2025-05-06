<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Product;

class ResisterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'ログインしてください。']);
        }

        $className = $user->class_name;

        // class_name に紐づく Store を取得
        $store = Store::where('class_name', $className)->first();

        if (!$store) {
            return back()->withErrors(['message' => '対応する店舗が見つかりません。']);
        }

        // store_name で商品を取得（※ productテーブルにstore_nameカラムが必要）
        $products = Product::where('store_name', $store->store_name)->get();

        return view('user.resister', [
            'store' => $store,
            'products' => $products,
        ]);
    }
}
