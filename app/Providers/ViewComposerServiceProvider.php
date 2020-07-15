<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;

class ViewComposerServiceProvider extends ServiceProvider
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
        View::composer('blog.partials._sidebar', function ($view) {
        $view->with('categories', Category::orderBy('name', 'asc')->get());
        });
        // Можно вместо фасада представления использовать функцию-хелпер view():
        view()->composer(['blog.partials._sidebar', 'welcome'], \App\Http\ViewComposers\RecentPostsComposer::class);
        
        view()->composer('welcome', \App\Http\ViewComposers\FavoritePostsComposer::class);
        
        view()->composer('welcome', \App\Http\ViewComposers\FavoriteCategoriesComposer::class);
        
    }
}


