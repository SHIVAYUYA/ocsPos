<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreAdminController extends Controller
{
    public function index()
    {
        $stores = Store::all(); // Store モデルからすべて取得
        return view('admin.store', compact('stores'));
    }
}
