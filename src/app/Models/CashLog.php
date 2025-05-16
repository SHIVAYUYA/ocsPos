<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashLog extends Model
{
    use HasFactory;

    protected $table = 'cash_log';

    protected $fillable = [
        'class_name',
        'product_code',
        'count',
        'trade_datetime',
        'price',
        'free',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code', 'product_code');
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class, 'coupon_id', 'coupon_id')
            ->whereColumn('product_code', 'product_code');
    }
}
