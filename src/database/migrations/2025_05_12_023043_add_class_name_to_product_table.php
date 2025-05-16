<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_class_name_to_product_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassNameToProductTable extends Migration
{
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('class_name', 10)->after('product_code'); // Storeのclass_nameに合わせる

            // 外部キー制約を設定（任意）
            $table->foreign('class_name')->references('class_name')->on('store')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign(['class_name']);
            $table->dropColumn('class_name');
        });
    }
}

