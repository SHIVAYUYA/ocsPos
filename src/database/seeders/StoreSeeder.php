<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    public function run()
    {
        DB::table('store')->insert([
            [
                'class_name' => '1A',
                'store_name' => '焼きそば屋',
                'type' => 1,
                'classroom' => '101'
            ],
            [
                'class_name' => '2A',
                'store_name' => 'クレープ屋',
                'type' => 2,
                'classroom' => '102'
            ],
        ]);
    }
}
