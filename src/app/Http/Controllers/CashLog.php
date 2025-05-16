<?php

namespace App\Http\Controllers;

use App\Models\CashLog;
use App\Models\Product; // Product モデルをインポート
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashLogController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'logs' => 'required|array',
            'logs.*.class_name' => 'required|string|max:10',
            'logs.*.product_code' => 'required|string|max:5',
            'logs.*.quantity' => 'required|integer',
            'logs.*.price' => 'required|numeric',
            'logs.*.discount' => 'nullable|numeric',
        ]);

        $responseData = [];

        foreach ($data['logs'] as $log) {
            $cashLog = CashLog::create([
                'class_name' => $log['class_name'],
                'product_code' => $log['product_code'],
                'count' => $log['quantity'],
                'trade_datetime' => now(),
                'price' => $log['price'],
                'free' => false, // 必要に応じて処理を追加
            ]);

            // 関連する Product モデルを取得
            $product = Product::where('product_code', $log['product_code'])->first();

            $responseData[] = [
                'success' => true,
                'cash_log_id' => $cashLog->id,
                'product_code' => $log['product_code'],
                'product_name' => $product ? $product->product_name : null, // Product が存在すれば名前を取得
            ];
        }

        return response()->json($responseData);
    }
}