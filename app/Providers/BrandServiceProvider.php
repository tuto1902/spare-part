<?php namespace App\Providers;

use App\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Support\ServiceProvider;

class BrandServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\BrandInterface', function()
        {
            return new BrandRepository(new Brand());
        });
    }

}