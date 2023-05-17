<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class CategorySeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $json = Storage::disk('local')->get('public/categories.json');
        $categories = json_decode($json, true);

        foreach ($categories as $category) {
           Category::create($category);
        }

        $categories = Category::all();

        foreach ($categories as $category) {
            $category->generatePath();

            if (isset($category['thumb'])) {
                $mediaPath = storage_path("app/public/uploads/images/" . $category['thumb']);
                    $category->addMedia($mediaPath)
                        ->preservingOriginal()
                        ->toMediaCollection('images');
            }

            // $category->update([
            //     'description' => fake()->realText(500),
            //     'keywords' => fake()->words(fake()->numberBetween(3, 9)),
            //     'content' => fake()->realText(1500),
            // ]);
        }
    }
}
