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
                'ten' => 'Nguyen Van A',
                'email' => 'nahnah@gmail.com',
                'mat_khau' => bcrypt('12345'),
                'role' => 1
            ],
            [
                'ten' => 'Nguyen Thi B',
                'email' => 'thi@gmail.com',
                'mat_khau' => bcrypt('12345'),
                'role' => 1
            ]
        ];
        DB::table('vp_users')->insert($data);
    }
}
