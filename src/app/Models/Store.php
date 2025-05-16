<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    // テーブル名
    protected $table = 'store';

    // 主キー
    protected $primaryKey = 'class_name';

    // 主キーは文字列かつ自動増分ではないため false
    public $incrementing = false;

    // 主キーの型を指定
    protected $keyType = 'string';

    // タイムスタンプなし（テーブルに created_at, updated_at がないため）
    public $timestamps = false;

    // 一括代入可能なカラム
    protected $fillable = [
        'class_name',
        'store_name',
        'type',
        'classroom',
    ];
}
