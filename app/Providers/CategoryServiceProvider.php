<?php namespace App\Providers;

use App\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\CategoryInterface', function()
        {
            return new CategoryRepository(new Category());
        });
    }

}