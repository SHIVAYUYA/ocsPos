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

   
   // app/Models/Product.php
    public function store()
    {
        return $this->belongsTo(Store::class, 'class_name', 'class_name');
    }

}

