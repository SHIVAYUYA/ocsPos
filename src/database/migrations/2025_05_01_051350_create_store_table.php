<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_store_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->string('class_name', 10);
            $table->string('store_name', 30)->nullable();
            $table->tinyInteger('type');
            $table->string('classroom', 5);

            $table->primary('class_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store');
    }
}
