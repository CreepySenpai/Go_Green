<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "cate_name" => "Hop Giay",
                "cate_slug" => Str::slug('Hop Giay', '-'),
                "cate_des" => "Bao gom cac loai hop giay"
            ],
            [
                "cate_name" => "Hop Nhua",
                "cate_slug" => Str::slug('Hop Nhua', '-'),
                "cate_des" => "Bao gom cac loai hop nhua"
            ]
        ];

        DB::table('vp_categories')->insert($data);
    }
}
