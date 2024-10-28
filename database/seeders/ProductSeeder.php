<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // إنشاء فئات
        $category1 = Category::create(['name' => 'Electronics']);
        $category2 = Category::create(['name' => 'medical']);
        $category3 = Category::create(['name' => 'chemical']);
        $category4 = Category::create(['name' => 'nutrition']);
        $category5 = Category::create(['name' => 'cosmetic']);


        // إنشاء منتج وربطه بالفئات
        $product1 = Product::create([
            'name' => 'paracetamol',
            'description' => 'It is a medicine to relieve pain and joint pain',
            'price' => 20.000,
        ]);
        $product2 = Product::create([
            'name' => 'oil',
            'description' => 'It is a type of oil used for treatment and cooking',
            'price' => 100.000,
        ]);
        $product3 = Product::create([
            'name' => 'Laptop',
            'description' => 'A high-performance laptop',
            'price' => 12.000000,
        ]);

        // ربط المنتج بالفئات
        $product1->categories()->attach([$category2->id, $category3->id]);
        $product2->categories()->attach([$category4->id, $category5->id]);
        $product3->categories()->attach($category1->id);
    }
}
