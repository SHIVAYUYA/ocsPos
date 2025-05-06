<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('store_name')->after('price')->nullable(); // 位置はお好みで
        });
    }
    
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('store_name');
        });
    }
    
};
