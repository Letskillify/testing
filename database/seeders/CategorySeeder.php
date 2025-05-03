<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-living',
            ],
            [
                'name' => 'Sports & Outdoors',
                'slug' => 'sports-outdoors',
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create some subcategories
        $subcategories = [
            'Electronics' => ['Smartphones', 'Laptops', 'Accessories'],
            'Fashion' => ['Men', 'Women', 'Kids'],
            'Home & Living' => ['Furniture', 'Decor', 'Kitchen'],
            'Sports & Outdoors' => ['Fitness', 'Camping', 'Sports Equipment'],
            'Books' => ['Fiction', 'Non-Fiction', 'Educational'],
        ];

        foreach ($subcategories as $parentName => $subs) {
            $parent = Category::where('name', $parentName)->first();
            foreach ($subs as $subName) {
                Category::create([
                    'name' => $subName,
                    'slug' => Str::slug($subName),
                    'parent_id' => $parent->id,
                ]);
            }
        }
    }
}
