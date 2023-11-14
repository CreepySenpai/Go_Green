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
                'product_name' => 'Hop Thuong',
                'product_slug' => 'hop-thuong',
                'product_desc' => 'Very good',
                'product_price' => 100000,
                'product_image' => 'a.png',
                'product_count' => 10,
                'product_type' => 1

            ],
            [
                'product_name' => 'Hop Nhua',
                'product_slug' => 'hop-nhua',
                'product_desc' => 'Very good',
                'product_price' => 200000,
                'product_image' => 'b.png',
                'product_count' => 10,
                'product_type' => 1

            ]

        ];

        DB::table('vp_products')->insert($data);
    }
}
