<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();

        View::composer('frontend.layouts.partials.footer', function ($view) {
            $setting = Setting::pluck('value', 'key');
            $view->with('setting', $setting);
        });
    }
}
