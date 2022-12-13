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
        "image"=>storage_path('app/public/'.env('BANNER_IMAGES_UPLOAD_PATH'.'banner-4.png')),

        "type"=>"slider",
            ],
        ];
        foreach ($records as $record) {
            Banner::create($record);
        }
    }
}
