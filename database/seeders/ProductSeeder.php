<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ensure the directory exists
        Storage::disk('public')->makeDirectory('products');

        for ($i = 0; $i < 1000; $i++) { // Generating 100 products
            // Generate a random image file
            $imageName = Str::random(10) . '.jpg';
            $imagePath = "products/" . $imageName;
            $imageUrl = "https://picsum.photos/200/200?random=" . $i; // Random online image URL

            // Download and store the image
            $imageContents = file_get_contents($imageUrl);
            Storage::disk('public')->put($imagePath, $imageContents);

            // Store product with the saved image filename
            Product::create([
                'product_name' => $faker->word,
                'title' => $faker->sentence(5),
                'product_description' => $faker->paragraph,
                'product_active' => $faker->boolean,
                'product_stock' => $faker->numberBetween(0, 100),
                'product_price' => $faker->randomFloat(2, 10, 1000),
                'product_sale_price' => $faker->randomFloat(2, 5, 900),
                'product_color' => $faker->safeColorName,
                'product_image' => $imagePath
            ]);
        }
    }
}

