<?php

namespace App\Providers;

use App\Utils\Common;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CommonServiceProvider extends ServiceProvider
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
        //
        $common = new Common();
        View::share('appName', $common->getAppName());
    }
}
