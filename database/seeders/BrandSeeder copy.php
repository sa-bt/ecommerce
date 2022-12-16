<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribute;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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
                "name" => "Gucci",
            ], [
                "name" => "Puma",
            ], [
                "name" => "Adidas",
            ], [
                "name" => "Hermès",
            ], [
                "name" => "Louis Vuitton",
            ], [
                "name" => "Chanel",
            ], [
                "name" => "Chanel",
            ], [
                "name" => "Burberry",
            ],[
                "name" => "Zara",
            ],
        ];
        foreach ($records as $record) {
            Brand::firstOrCreate(["name"=>$record['name']],$record);
        }
    }
}
