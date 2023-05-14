<?php

namespace App\Providers;

use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use App\Models\Admin\Blog\BlogPostComment;
use App\Models\Admin\Blog\BlogTag;
use App\Models\Category;
use App\Models\FormMessage;
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
        if (Cache::has('categories')) {
            $categories = Cache::get('categories');
        } else {
            $categories = BlogCategory::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();

            Cache::put('categories', $categories, 30);
        }
        $tags = BlogTag::all();

        Facades\View::composer('front.layouts.chunks.sidebar', function (View $view) use ($categories, $tags) {
            $view->with([
                'categories' => $categories,
                'tags' =>  $tags,
            ]);
        });

        $categories = Category::defaultOrder()
            ->with('children', 'parent')
            ->get()
            ->toTree();

        Facades\View::composer(
            ['front.layouts.chunks.dynamic-menu', 'front.layouts.chunks.footer'],
            function (View $view) use($categories) {

            $view->with([
                'categories' => $categories,
            ]);
        });

        if (Cache::has('popularPosts')) {
            $popularPosts = Cache::get('popularPosts');
        } else {
            $popularPosts = BlogPost::orderBy('views', 'desc')
                ->with('media', 'category')
                ->limit(3)
                ->get();

            Cache::put('popularPosts', $popularPosts, 30);
        }

        Facades\View::composer('front.layouts.chunks.popular-posts', function (View $view) use ($popularPosts)
        {
            $view->with([
                'popularPosts' => $popularPosts,
            ]);
        });

        if (Cache::has('featuredPosts')) {
            $featuredPosts = Cache::get('featuredPosts');
        } else {
            $featuredPosts = BlogPost::where('is_featured', 1)
                ->latest()
                ->with('media', 'category')
                ->limit(4)
                ->get();

            Cache::put('featuredPosts', $featuredPosts, 30);
        }

        Facades\View::composer('front.layouts.chunks.featured', function(View $view) use ($featuredPosts) {
            $view->with([
                'featuredPosts' => $featuredPosts,
            ]);
        });

        Facades\View::composer('admin.layouts.layout', function(View $view) {

            $allMessages = FormMessage::orderBy('created_at', 'desc');
            $messages = $allMessages->get();
            $unreadMessages = $allMessages->where('is_read', 0)->get();

            $postCount = BlogPost::all()->count();
            $categoriesCount = BlogCategory::all()->count();
            $tagsCount = BlogTag::all()->count();
            $unreadCommentsCount = BlogPostComment::where('is_read', 0)->count();

            $view->with([
                'messages' => $messages,
                'unreadMessages' => $unreadMessages,
                'postCount' => $postCount,
                'categoriesCount' => $categoriesCount,
                'tagsCount' => $tagsCount,
                'commentsCount' => $unreadCommentsCount,
            ]);
        });
    }
}
