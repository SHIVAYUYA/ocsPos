<?php

// app/Http/Controllers/LogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashLog extends Controller
{
    public function store()
    {
        return $this->belongsTo(Store::class, 'class_name', 'class_name');
    }

}
