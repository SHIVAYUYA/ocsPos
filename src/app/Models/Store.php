<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'class_name';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['class_name', 'store_name', 'type', 'classroom'];

    public function cashLogs()
    {
        return $this->hasMany(CashLog::class, 'class_name', 'class_name');
    }
}
