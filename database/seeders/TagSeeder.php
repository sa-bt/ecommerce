<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
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
                "name" => "شلوار",
            ], [
                "name" => "پیراهن",
            ], [
                "name" => "تیشرت",
            ], [
                "name" => "رکابی",
            ], [
                "name" => "شورت",
            ], [
                "name" => "شلوارک",
            ], [
                "name" => "جوراب",
            ], [
                "name" => "شلوار راحتی",
            ],[
                "name" => "جین",
            ],
        ];
        foreach ($records as $record) {
            Tag::firstOrCreate(["name"=>$record['name']],$record);
        }
    }
}
