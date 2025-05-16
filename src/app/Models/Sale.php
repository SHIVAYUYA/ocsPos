<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
protected $table = 'cash_log';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'class_name',
        'trade_datetime',
        'count',
        'product_code',
        'price',
        'free',
    ];

    /**
     * Product モデルとのリレーション (1対1の逆)
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_code', 'product_code');
    }

    /**
     * Store モデルとのリレーション (1対1の逆)
     *
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'class_name', 'class_name');
    }

    /**
     * クーポン価格を取得 (Product モデルに関連付けられていると仮定)
     *
     * @return float|null
     */
    public function getCouponPriceAttribute(): ?float
    {
        return $this->product ? $this->product->price : null; // Product モデルの price をクーポン価格として仮定
    }

    /**
     * 商品名を取得 (Product モデルに関連付けられていると仮定)
     *
     * @return string|null
     */
    public function getProductNameAttribute(): ?string
    {
        return $this->product ? $this->product->product_name : null;
    }

    /**
     * 合計金額を取得 (単価 * 点数)
     *
     * @return float|null
     */
    public function getTotalAmountAttribute(): ?float
    {
        return $this->product ? $this->product->price * $this->count : null;
    }

    /**
     * 単価を取得 (Product モデルから)
     *
     * @return float|null
     */
    public function getUnitPriceAttribute(): ?float
    {
        return $this->product ? $this->product->price : null;
    }
}
