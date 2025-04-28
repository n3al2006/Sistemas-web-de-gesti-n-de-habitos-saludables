<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->updateOrInsert(
            ['username' => 'admin'],
            [
                'password' => 'admin1234',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}