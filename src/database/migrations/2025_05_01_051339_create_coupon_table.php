<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_coupon_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('coupon_id');  // coupon_id に auto_increment を設定
            $table->string('product_code', 5);  // product_code は 5文字
            $table->integer('coupon_price')->nullable();  // coupon_price は auto_increment を削除
            $table->primary(['coupon_id', 'product_code']);  // 複合主キーを設定
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
}

