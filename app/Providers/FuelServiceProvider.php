<?php namespace App\Providers;

use App\Fuel;
use App\Repositories\FuelRepository;
use Illuminate\Support\ServiceProvider;

class FuelServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\FuelInterface', function()
        {
            return new FuelRepository(new Fuel());
        });
    }

}