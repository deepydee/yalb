<?php

namespace App\Providers;

use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogTag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
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
            $view->with([
                'categories' => BlogCategory::all(),
                'tags' => BlogTag::all(),
            ]);
        });
    }
}
