<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoriesComposer;
use App\View\Composers\TagsComposer;
use App\View\Composers\LatestPostsComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.components.navigation', CategoriesComposer::class);
        View::composer('frontend.components.tags', TagsComposer::class);
        View::composer('frontend.components.latest-posts', LatestPostsComposer::class);
    }
}
