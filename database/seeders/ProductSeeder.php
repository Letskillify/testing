<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 14 Pro',
                'description' => 'Latest iPhone with advanced camera system and A16 Bionic chip.',
                'price' => 999.99,
                'stock_quantity' => 50,
                'brand_name' => 'Apple',
                'category_name' => 'Smartphones',
                'is_featured' => true,
                'is_new' => true,
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' => 'Premium Android smartphone with S Pen and 200MP camera.',
                'price' => 1199.99,
                'stock_quantity' => 40,
                'brand_name' => 'Samsung',
                'category_name' => 'Smartphones',
                'is_featured' => true,
                'is_new' => true,
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Comfortable running shoes with Air Max cushioning.',
                'price' => 150.00,
                'stock_quantity' => 100,
                'brand_name' => 'Nike',
                'category_name' => 'Sports Equipment',
                'is_featured' => true,
                'is_new' => false,
            ],
            [
                'name' => 'IKEA MALM Bed Frame',
                'description' => 'Modern bed frame with storage, queen size.',
                'price' => 299.00,
                'stock_quantity' => 25,
                'brand_name' => 'IKEA',
                'category_name' => 'Furniture',
                'is_featured' => false,
                'is_new' => false,
            ],
            [
                'name' => 'Dell XPS 13',
                'description' => 'Premium ultrabook with InfinityEdge display.',
                'price' => 1299.99,
                'stock_quantity' => 30,
                'brand_name' => 'Dell',
                'category_name' => 'Laptops',
                'is_featured' => true,
                'is_new' => true,
            ],
        ];

        foreach ($products as $productData) {
            $brand = Brand::where('name', $productData['brand_name'])->first();
            $category = Category::where('name', $productData['category_name'])->first();

            if ($brand && $category) {
                Product::create([
                    'name' => $productData['name'],
                    'slug' => Str::slug($productData['name']),
                    'sku' => Str::upper(Str::random(8)),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'stock_quantity' => $productData['stock_quantity'],
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                    'is_featured' => $productData['is_featured'],
                    'is_new' => $productData['is_new'],
                    'images' => json_encode(['default.jpg']), // Default image
                ]);
            }
        }
    }
}
