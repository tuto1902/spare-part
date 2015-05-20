<?php namespace App\Providers;

use App\Spare;
use App\Repositories\SpareRepository;
use Illuminate\Support\ServiceProvider;

class SpareServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\SpareInterface', function()
        {
            return new SpareRepository(new Spare());
        });
    }

}