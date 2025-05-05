<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // 管理者のビューを返す
        return view('admin.index');
    }

    public function store()
    {
        // 店舗管理ページなどを返す処理
        return view('admin.store');
    }
}