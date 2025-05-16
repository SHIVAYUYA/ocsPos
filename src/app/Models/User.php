<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 使用するテーブル
    protected $table = 'user';

    // 一括代入可能な属性
    protected $fillable = [
        'class_name',
        'password',
    ];

    // シリアライズ時に隠す属性
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // キャストする属性の型
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * LaravelにログインIDとして 'class_name' を使うよう指示
     */
    public function getAuthIdentifierName()
    {
        return 'class_name';
    }

    public function store(): BelongsTo
    {   
        return $this->belongsTo(Store::class, 'class_name', 'class_name');
    }

}
