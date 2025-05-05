<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashLog;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        try {
            // 最新の売上履歴を取得（例：直近30件）
            $results = CashLog::with(['product', 'coupon'])
                ->orderBy('trade_datetime', 'desc')
                ->limit(30)
                ->get();

            // 売上合計計算
            $totalSum = $results->reduce(function ($carry, $row) {
                $price = $row->product->price ?? 0;
                $count = $row->count ?? 0;
                $coupon = $row->coupon->coupon_price ?? 0;
                return $carry + ($price * $count - $coupon);
            }, 0);

            return view('user.sales', compact('results', 'totalSum'));
        } catch (\Exception $e) {
            return view('user.sales', ['error' => '売上情報の取得中にエラーが発生しました。']);
        }
    }
}
