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
        $status = fake()->randomElement(['published' , 'draft']);
        $isFeatured = $status === 'published' ?
            fake()->randomElement([0 , 1]) :
            0;

        return [
            'title' => fake()->sentence(),
            'description' => fake()->realText(),
            'keywords' => fake()->words(fake()->numberBetween(3, 7)),
            'content' => fake()->realText(3000),
            'category_id' => BlogCategory::factory(),
            'views' => fake()->randomNumber(5, false),
            'status' => $status,
            'is_featured' => $isFeatured,
            'created_at' => fake()->unixTime(),
            'updated_at' => fake()->unixTime(),
        ];
    }
}
