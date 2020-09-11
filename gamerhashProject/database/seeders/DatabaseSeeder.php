<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'c1']);
        Category::create(['name'=>'c2']);
        Category::create(['name'=>'c3']);
        Category::create(['name'=>'c4']);

        Product::create(['name'=>'p1', 'price' => 100, 'description'=>'p1 desc']);
        Product::create(['name'=>'p2', 'price' => 200, 'description'=>'p2 desc']);
        Product::create(['name'=>'p3', 'price' => 300, 'description'=>'p3 desc']);
        Product::create(['name'=>'p4', 'price' => 400, 'description'=>'p4 desc']);
        Product::create(['name'=>'p5', 'price' => 500, 'description'=>'p5 desc']);
        Product::create(['name'=>'p6', 'price' => 600, 'description'=>'p6 desc']);
        Product::create(['name'=>'p7', 'price' => 700, 'description'=>'p7 desc']);
        Product::create(['name'=>'p8', 'price' => 800, 'description'=>'p8 desc']);


        Category::find(1)->products()->attach(Product::find(1));
        Category::find(1)->products()->attach(Product::find(3));
        Category::find(1)->products()->attach(Product::find(5));

        Product::find(2)->categories()->attach(Category::find(1));
        Product::find(4)->categories()->attach(Category::find(1));

    }
}
