<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name'=>'Apple','sku'=>'APL001','quantity'=>50,'reorder_level'=>10]);
        Product::create(['name'=>'Banana','sku'=>'BNA001','quantity'=>20,'reorder_level'=>5]);
        Product::create(['name'=>'Orange','sku'=>'ORG001','quantity'=>5,'reorder_level'=>10]);
    }
}
