<?php namespace App\Providers;

use App\Transmission;
use App\Repositories\TransmissionRepository;
use Illuminate\Support\ServiceProvider;

class TransmissionServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\TransmissionInterface', function()
        {
            return new TransmissionRepository(new Transmission());
        });
    }

}