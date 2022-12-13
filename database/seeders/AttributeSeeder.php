<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
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
                "name" => "رنگ",
            ], [
                "name" => "اندازه",
            ], [
                "name" => "جنس",
            ], [
                "name" => "شکل",
            ], [
                "name" => "مدل",
            ], [
                "name" => "مارک",
            ], [
                "name" => "شرکت تولید کننده",
            ], [
                "name" => "بو",
            ],
        ];
        foreach ($records as $record) {
            Attribute::create($record);
        }
    }
}
