<?php

namespace Database\Seeders;

use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use App\Models\Admin\Blog\BlogTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = BlogTag::factory(5)->create();

        BlogCategory::factory()
            ->count(3)
            ->create()
            ->each(function($category) use($tags) {
                BlogPost::factory()
                    ->count(rand(2, 4))
                    ->create([
                        'category_id' => $category->id
                    ])->each(function($post) use ($tags) {
                        $post->tags()->attach($tags->random(2));
            });
        });
    }
}
