<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_code';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['product_code', 'class_name', 'product_name', 'image_path', 'price'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'class_name', 'class_name');
    }
}

