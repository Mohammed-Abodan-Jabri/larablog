<?php

namespace App\Providers;

use App\Services\CommonService;
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
        View::share('common', new CommonService());
    }
}
