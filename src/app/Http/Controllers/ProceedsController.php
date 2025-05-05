<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CashLog;

class ProceedsController extends Controller
{
    public function index()
    {
        $results = CashLog::join('store', 'cash_log.class_name', '=', 'store.class_name')
            ->select('store.class_name', 'store.store_name',
                DB::raw('COUNT(*) AS total_count'),
                DB::raw('SUM(CASE 
                    WHEN cash_log.free IS NOT NULL AND cash_log.free != "" 
                        THEN (CAST(cash_log.count AS UNSIGNED) * 100 - CAST(cash_log.free AS UNSIGNED))
                    ELSE (CAST(cash_log.count AS UNSIGNED) * 100)
                END) AS total_sales')
            )
            ->groupBy('store.class_name', 'store.store_name')
            ->orderBy('store.class_name')
            ->get();
        // return view('proceeds', compact('results')); // ← これに変更
        return view('admin.proceeds', compact('results'));

    }

}
