<?php

// app/Http/Controllers/LogController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        try {
            $results = DB::table('cash_log')
                ->join('store', 'cash_log.class_name', '=', 'store.class_name')
                ->join('product', 'cash_log.product_code', '=', 'product.product_code')
                ->leftJoin('coupon', function ($join) {
                    $join->on('cash_log.coupon_id', '=', 'coupon.coupon_id')
                         ->on('cash_log.product_code', '=', 'coupon.product_code');
                })
                ->orderByDesc('cash_log.trade_datetime')
                ->select([
                    'cash_log.product_code',
                    'product.product_name',
                    'product.price',
                    'coupon.coupon_price',
                    'cash_log.count',
                    'cash_log.trade_datetime'
                ])
                ->get();

            $totalSum = $results->reduce(function ($carry, $row) {
                $price = $row->price ?? 0;
                $count = $row->count ?? 0;
                $coupon = $row->coupon_price ?? 0;
                return $carry + ($price * $count - $coupon);
            }, 0);

            return view('log.index', compact('results', 'totalSum'));

        } catch (\Exception $e) {
            $error = $e->getMessage();
            return view('log.index', compact('error'));
        }
    }
}
