<?php

namespace Database\Seeders;

use App\Models\Admin\Blog\BlogPost;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        BlogPost::factory()
            ->count(5)
            ->create();

        $posts = BlogPost::all();

        $date = date('Y-m-d');
        $filePath =  "public/storage/uploads/images/$date/";

        if (!file_exists($filePath)) {
            mkdir($filePath, 0755);
        }

        foreach ($posts as $post) {
            $fakerFileName = $faker->image(
                $filePath,
                300,
                300
            );

            $mediaPath = storage_path("app/public/uploads/images/$date/" . basename($fakerFileName));

            $post->addMedia($mediaPath)
                 ->toMediaCollection('images');
        }
    }
}
