<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_name' => 'Ống hút cỏ bàng (Grass straws) ',
                'product_slug' => 'ong-hut',
                'product_desc' => 'Very good',
                'product_price' => 100000,
                'product_image' => 'ong_hut_01.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => 'Ống Hút Tinh Bột Gạo',
                'product_slug' => 'ong-hut',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'ong_hut_02.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => '50 Cốc giấy ly giấy dùng 1 lần 260ml-9oz',
                'product_slug' => 'coc-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'cocgiay.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => 'SET 10 HỘP TRÒN GIẤY KRAFT/ TRE 750ML',
                'product_slug' => 'hop-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'kraft.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => 'SET 10 HỘP TRÒN GIẤY KRAFT/ TRE 750ML',
                'product_slug' => 'hop-giay',
                'product_desc' => 'Very good',
                'product_price' => 400000,
                'product_image' => 'kraft.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => '50 cái hộp giấy 3 ngăn, hộp giấy 4 ngăn',
                'product_slug' => 'hop-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'hopgiaybonngan.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => '50 cái hộp giấy 3 ngăn, hộp giấy 4 ngăn',
                'product_slug' => 'hop-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'hopgiaybonngan.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => '50 Cốc giấy ly giấy dùng 1 lần 260ml-9oz',
                'product_slug' => 'coc-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'cocgiay.jpg',
                'product_count' => 10,
                'product_type' => 4

            ],
            [
                'product_name' => '50 Cốc giấy ly giấy dùng 1 lần 260ml-9oz',
                'product_slug' => 'coc-giay',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'cocgiay.jpg',
                'product_count' => 10,
                'product_type' => 4

            ]
        ];

        DB::table('vp_products')->insert($data);
    }
}
