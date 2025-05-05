<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupon')->insert([
            [
                'coupon_id' => 1,
                'product_code' => 'P001',
                'coupon_price' => 250
            ],
            [
                'coupon_id' => 2,
                'product_code' => 'P002',
                'coupon_price' => 300
            ],
        ]);
    }
}
