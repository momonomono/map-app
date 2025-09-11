<?php

namespace App\Providers;

use App\View\Components\Button\SliderButton;
use App\View\Components\button\MainButton;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component(SliderButton::class, "slider-button");
        Blade::component(MainButton::class, "main-button");
    }
}
