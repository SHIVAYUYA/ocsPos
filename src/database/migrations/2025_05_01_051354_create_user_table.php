<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_user_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('login_id', 7);
            $table->string('class_name', 10);
            $table->string('password', 255)->nullable();

            $table->primary(['login_id', 'class_name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}

