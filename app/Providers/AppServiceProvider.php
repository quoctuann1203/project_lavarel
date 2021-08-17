<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\ShowError;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191); //Tu them
        Blade::component('show-error', ShowError::class);
        Blade::component('alert', Alert::class);
    }
}
