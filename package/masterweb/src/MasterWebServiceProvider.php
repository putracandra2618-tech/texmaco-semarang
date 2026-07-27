<?php 

namespace Smt\Masterweb;

use Illuminate\Support\ServiceProvider;

class MasterWebServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'masterweb');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/public/assets' => public_path('assets'),
        ], 'public');
    }

    public function register()
    {
        # code...
    }
}