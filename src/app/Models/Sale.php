<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales'; // テーブル名

    protected $fillable = [
        'product_name',
        'product_code',
        'price',
        'count',
        'coupon_price',
        'trade_datetime',
    ];

    public $timestamps = false; // created_at, updated_atが不要な場合
}
