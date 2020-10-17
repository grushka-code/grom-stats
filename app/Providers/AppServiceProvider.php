<?php

namespace App\Providers;

use App\Models\Directory;
use App\Models\DirectoryManager;
use App\Models\Page;
use App\Models\PageManager;
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
        //
        $this->app->bind('DirectoryManager', function () {
            return new DirectoryManager(new Directory());
        });
        $this->app->bind('PageManager', function () {
            return new PageManager(new Page());
        });
    }
}
