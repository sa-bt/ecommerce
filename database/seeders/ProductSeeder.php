<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $records = [
            [
                'name' => "product1",
                'brand_id' => "2",
                'category_id' => "2",
                'primary_image' => "product-1.svg",
                'description' => "product1",
            ],
            [
                'name' => "product",
                'brand_id' => "1",
                'category_id' => "1",
                'primary_image' => "product-2.svg",
                'description' => "product2",

            ],
            [
                'name' => "product3",
                'brand_id' => "3",
                'category_id' => "3",
                'primary_image' => "product-3.svg",
                'description' => "product3",
            ],
        ];
        foreach ($records as $record) {
            Product::firstOrCreate(["name" => $record['name']], $record);
        }
    }
}
