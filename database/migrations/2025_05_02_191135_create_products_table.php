<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();

            // Temporarily use unsignedBigInteger instead of foreignId
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id');

            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('currency', 10)->default('USD');
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('unit', 50)->default('piece');
            $table->integer('stock_quantity')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_new')->default(false);
            $table->string('material')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->text('care_instructions')->nullable();
            $table->json('images')->nullable();
            $table->json('additional_features')->nullable();
            $table->string('movement')->nullable();
            $table->string('case_material')->nullable();
            $table->string('band_material')->nullable();
            $table->string('water_resistance')->nullable();
            $table->string('dial_color')->nullable();
            $table->string('case_diameter')->nullable();
            $table->json('functions')->nullable();
            $table->string('size')->nullable();
            $table->string('artist')->nullable();
            $table->string('edition_number')->nullable();
            $table->string('frame')->nullable();
            $table->string('type')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('battery_life')->nullable();
            $table->string('fragrance_family')->nullable();
            $table->json('top_notes')->nullable();
            $table->json('heart_notes')->nullable();
            $table->json('base_notes')->nullable();
            $table->string('origin')->nullable();
            $table->string('roast_level')->nullable();
            $table->json('flavor_profile')->nullable();
            $table->string('packaging')->nullable();
            $table->string('hardware')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}; 