<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashLogTable extends Migration
{
    public function up()
    {
        Schema::create('cash_log', function (Blueprint $table) {
            $table->id(); // Laravel 標準の auto-increment 主キー（id）
            $table->string('class_name', 10);
            $table->dateTime('trade_datetime', 6);
            $table->integer('count')->default(0); // 商品の個数
            $table->string('product_code', 5); // 外部キー制約のある product_code
            $table->boolean('free')->nullable();
            $table->timestamps(); // created_at, updated_at を追加（任意）

            // 外部キー制約
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
