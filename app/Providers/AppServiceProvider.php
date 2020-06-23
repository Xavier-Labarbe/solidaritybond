<?php

namespace App\Providers;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
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


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() === 'local') {
            if (isset($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'])) {
                file_put_contents('php://stdout',
                "\e[33mHTTP::{$_SERVER['REQUEST_METHOD']} \e[0m{$_SERVER['REQUEST_URI']}\n");
            }
        }
    }
}
