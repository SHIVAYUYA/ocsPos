<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = ['coupon_id', 'product_code'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['coupon_id', 'product_code', 'coupon_price'];
}
