<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CashLog;
use Illuminate\Support\Facades\DB;
use App\Models\Store; // Store モデルをインポート

class ResisterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $store = null;

        if ($user && $user->store) {
            $store = $user->store;
        }

        $products = Product::all()->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->product_name,
                'price' => $p->price,
                'product_code' => $p->product_code,
                'class_name' => $p->class_name,
            ];
        });

        return view('user.resister', compact('store', 'products'));
    }


    public function store(Request $request)
    {
        $logs = $request->input('logs'); // JSONの中に logs 配列がある想定

        if (!$logs || !is_array($logs)) {
            return response()->json(['success' => false, 'message' => '不正なデータ形式です'], 400);
        }

        foreach ($logs as $log) {
            if (
                !isset($log['class_name']) ||
                !isset($log['product_code']) ||
                !isset($log['price']) ||
                !isset($log['count']) // count が必須項目に追加
            ) {
                continue; // 必須項目が足りないログはスキップ
            }

            CashLog::create([
                'class_name'    => $log['class_name'],
                'product_code'  => $log['product_code'],
                'price'         => $log['price'],
                'count'         => $log['count'], // count を登録
                'discount'      => $log['discount'] ?? 0,
                'trade_datetime' => now(),
            ]);
        }

        return response()->json(['success' => true, 'message' => '保存成功']);
    }
}