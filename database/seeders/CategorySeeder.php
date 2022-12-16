<?php

namespace Database\Seeders;

use App\Models\Category;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records=[
            [
        "name"=>"پوشاک",
            ],
            [
        "name"=>"گوشی",
            ],
            [
        "name"=>"مردانه",
        "parent_id"=>"1",
        "description"=>"پوشاک مردانه",
            ],
            [
        "name"=>"زنانه",
        "parent_id"=>"1",
        "description"=>"پوشاک زنانه",
            ],
            [
        "name"=>"بچگانه",
        "parent_id"=>"1",
        "description"=>"پوشاک بچگانه",
            ],
            [
        "name"=>"سامسونگ",
        "parent_id"=>"2",
        "description"=>"گوشی سامسونگ",
            ],
            [
        "name"=>"شیاومی",
        "parent_id"=>"2",
        "description"=>"شیاومی",
            ],
            [
        "name"=>"اپل",
        "parent_id"=>"2",
        "description"=>"گوشی اپل",
            ]

        ];
        // $attributes=Attribute::all();
        foreach($records as $record){
            Category::firstOrCreate(["name"=>$record['name']],$record);
        }
        $categories=Category::where('parent_id',1)->get();
        foreach ($categories as $category) {
            $category->attributes()->sync([1,2,3,6,7]);
        }
    }
}
