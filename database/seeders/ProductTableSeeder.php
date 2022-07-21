<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $product->category_id = 1;
        $product->name = 'Nike T-shirt';
        $product->description = 'A plain blue t shirt with Nike logo at the top left corner';
        $product->size = 'Large';
        $product->price = 20;
        $product->quantity = 1;
        $product->save();


    }
}
