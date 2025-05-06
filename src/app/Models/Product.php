<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_code';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['product_code', 'product_name', 'price'];

    // store_nameで関連付け
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_name', 'store_name'); // store_name を参照
    }
}

