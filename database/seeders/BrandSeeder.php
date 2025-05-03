<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'description' => 'Leading technology company known for iPhones, MacBooks, and other electronics.',
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'description' => 'Global electronics manufacturer offering a wide range of devices.',
            ],
            [
                'name' => 'Nike',
                'slug' => 'nike',
                'description' => 'World-famous sports and athletic wear brand.',
            ],
            [
                'name' => 'Adidas',
                'slug' => 'adidas',
                'description' => 'Popular sports and lifestyle brand.',
            ],
            [
                'name' => 'IKEA',
                'slug' => 'ikea',
                'description' => 'Swedish furniture and home accessories company.',
            ],
            [
                'name' => 'H&M',
                'slug' => 'h-and-m',
                'description' => 'Fashion retailer offering trendy clothing and accessories.',
            ],
            [
                'name' => 'Sony',
                'slug' => 'sony',
                'description' => 'Leading electronics and entertainment company.',
            ],
            [
                'name' => 'Dell',
                'slug' => 'dell',
                'description' => 'Computer technology company.',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
