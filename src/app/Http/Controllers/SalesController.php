<?php

namespace App\Http\Controllers;

use App\Models\CashLog;
use Illuminate\View\View;

class SalesController extends Controller
{
    public function index(): View
    {
        $results = CashLog::with('product')->orderBy('trade_datetime', 'desc')->get();
        $totalSum = $results->sum(function ($row) {
            $price = $row->price ?? 0;
            $count = $row->count ?? 0;
            // クーポン値引きの計算方法が不明なため、必要に応じて修正してください
            $coupon = 0; // 例として 0 を設定
            return ($price * $count) - $coupon;
        });

        return view('user.sales', compact('results', 'totalSum'));
    }
}