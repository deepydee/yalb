<?php

namespace App\Providers;

use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use App\Models\Admin\Blog\BlogTag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('front.layouts.chunks.sidebar', function (View $view) {
            if (Cache::has('categories')) {
                $categories = Cache::get('categories');
            } else {
                $categories = BlogCategory::withCount('posts')
                ->orderBy('posts_count', 'desc')
                ->get();

                Cache::put('categories', $categories, 30);
            }

            $view->with([
                'categories' => $categories,
                'tags' => BlogTag::all(),
            ]);
        });

        Facades\View::composer('front.layouts.chunks.popular-posts', function (View $view) {
             if (Cache::has('popularPosts')) {
                $popularPosts = Cache::get('popularPosts');
            } else {
                $popularPosts = BlogPost::orderBy('views', 'desc')
                ->limit(4)->get();

                Cache::put('popularPosts', $popularPosts, 30);
            }

            $view->with([
                'popularPosts' => $popularPosts,
            ]);
        });
    }
}
