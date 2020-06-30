<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\View\Components\Button;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::component('button', Button::class);
        Blade::include('greetings', 'greet');

        Blade::directive('date', function($value){
                return date('m/d/Y H:i');
        });
    }
}
