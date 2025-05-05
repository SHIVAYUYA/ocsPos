<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashLog extends Model
{
    protected $table = 'cash_log';
    public $timestamps = false;

    protected $primaryKey = ['coupon_id', 'class_name'];
    public $incrementing = false;

    protected $fillable = ['coupon_id', 'class_name', 'trade_datetime', 'count', 'product_code', 'free'];

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
