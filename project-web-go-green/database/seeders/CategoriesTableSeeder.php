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
                "cate_name" => "Hộp giấy",
                "cate_slug" => Str::slug('Hop Giay', '-'),
                "cate_des" => "Bao gom cac loai hop giay"
            ],
            [
                "cate_name" => "Ống hút",
                "cate_slug" => Str::slug('Ong hut', '-'),
                "cate_des" => "Bao gom cac loai ong hut"
            ]
        ];

        DB::table('vp_categories')->insert($data);
    }
}
