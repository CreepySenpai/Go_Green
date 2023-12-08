<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_name' => 'Nguyen Van A',
                'email' => 'nahnah@gmail.com',
                'password' => bcrypt('12345'),
                'role_type' => 1
            ],
            [
                'user_name' => 'Nguyen Thi B',
                'email' => 'thi@gmail.com',
                'password' => bcrypt('12345'),
                'role_type' => 1
            ]
        ];
        DB::table('vp_users')->insert($data);
    }
}
