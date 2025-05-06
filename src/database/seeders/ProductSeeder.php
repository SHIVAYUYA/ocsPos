<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
            [
                'product_code' => 'P001',
                'product_name' => '焼きそば',
                'price' => 300,
                'picture' => null,
                'store_name' => '模擬店A', // 追加（Storeテーブルと一致させること）
            ],
            [
                'product_code' => 'P002',
                'product_name' => 'クレープ（いちご）',
                'price' => 350,
                'picture' => null,
                'store_name' => 'クレープ屋', // 追加
            ],
        ]);
    }
}
