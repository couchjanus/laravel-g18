<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Пример с форматированием:
        Blade::directive('double', function($expression) {
            return "<?php echo number_format($expression / 100, 2, '.', ' '); ?>";
        });

        Blade::directive('fa', function($expression) {
            return  '<i class="fa ' . str_replace("'", "", $expression) . '" aria-hidden="true"></i>';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()   {
        Schema::defaultStringLength(191);
    }
       
}
