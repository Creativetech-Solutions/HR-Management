<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\model\Settings;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $thisasd = Settings::all();
//        view::share('site_settings', $thisasd);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
