<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_product_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->string('product_code', 5)->primary();  // product_codeは主キー
            $table->string('product_name', 40);
            $table->integer('price')->nullable();  // priceはauto_incrementではない
            $table->integer('picture')->unsigned()->nullable();  // pictureはauto_incrementではない
        });
    }
    
    


    public function down()
    {
        Schema::dropIfExists('product');
    }
}

