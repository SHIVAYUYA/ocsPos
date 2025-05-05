<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResisterController extends Controller
{
    public function index()
    {
        return view('user.resister');
    }
}
