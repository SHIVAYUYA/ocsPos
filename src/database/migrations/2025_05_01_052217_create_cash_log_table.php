<?php

// database/migrations/2025_05_01_051335_create_cash_log_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashLogTable extends Migration
{
    public function up()
    {
        Schema::create('cash_log', function (Blueprint $table) {
            $table->increments('coupon_id'); // auto_increment カラム
            $table->string('class_name', 10);
            $table->dateTime('trade_datetime', 6);
            $table->integer('count');
            $table->string('product_code', 5); // 確認: product テーブルの product_code と一致させる
            $table->boolean('free')->nullable();

            $table->primary(['coupon_id', 'class_name']);
            
            // 外部キー制約: データ型と長さが一致していることを確認
            $table->foreign('product_code')
                ->references('product_code')
                ->on('product')
                ->onUpdate('cascade');

            $table->foreign('class_name')
                ->references('class_name')
                ->on('store')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cash_log');
    }
}

