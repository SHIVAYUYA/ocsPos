<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_login_maneger_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginManegerTable extends Migration
{
    public function up()
    {
        Schema::create('login_maneger', function (Blueprint $table) {
            $table->string('login_id', 7)->primary();  // login_id を主キーとして設定
            $table->integer('login_manegerid')->unsigned();  // login_manegerid を通常の整数カラムに変更
            $table->dateTime('login_datetime', 6)->nullable();  // login_datetime は nullable
        });
    }
    
    

    public function down()
    {
        Schema::dropIfExists('login_maneger');
    }
}
