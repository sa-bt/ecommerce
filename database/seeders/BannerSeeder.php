<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribute;
use App\Models\Banner;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
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
                "image" => 'banner-6.png',
                "type" => "index-top",
            ],
            [
                "image" => 'banner-7.png',
                "type" => "index-top",
            ],
            [
                "image" => 'banner-8.png',
                "type" => "index-top",
            ],
            [
                "image" => 'banner-4.png',
                "type" => "index-bottom",
            ],
            [
                "image" => 'banner-5.png',
                "type" => "index-bottom",
            ],
        ];
        foreach ($records as $record) {
            Banner::firstOrCreate(["image"=>$record['image']],$record);
        }
    }
}
