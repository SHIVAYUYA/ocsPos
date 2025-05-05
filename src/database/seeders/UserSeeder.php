<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run() {
        // DB::table('user')->insert([
        //     'login_id' => 'A000001',
        //     'class_name' => '1A',
        //     'password' => hash('sha256', 'testpass'),
        // ]);

        DB::table('user')->insert([
            'login_id' => 'A000002',
            'class_name' => '2A',
            'password' => Hash::make('testpass'), // ← これが重要！
        ]);

        DB::table('user')->insert([
            'login_id' => 'A000003',
            'class_name' => 'admin',
            'password' => Hash::make('testpass'), // ← これが重要！
        ]);
    }
}
