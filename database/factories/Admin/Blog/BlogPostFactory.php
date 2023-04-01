<?php

namespace Database\Factories\Admin\Blog;

use App\Models\Admin\Blog\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $folder = date('Y-m-d');
        $filePath =  "public/storage/uploads/images/";

        $fakerFileName = $this->faker->image(
            $filePath,
            800,
            600
        );

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraphs(3, true),
            'content' => fake()->text(2000),
            'category_id' => BlogCategory::factory(),
            'views' => fake()->randomNumber(5, false),
            'thumbnail' => 'images/' . basename($fakerFileName),
            'status' => fake()->randomElement(['published' , 'draft']),
            'is_featured' => fake()->randomElement([0 , 1]),
            'created_at' => fake()->unixTime(),
            'updated_at' => fake()->unixTime(),
        ];
    }
}
