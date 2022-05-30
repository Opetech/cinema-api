<?php

namespace App\Providers;

use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\LocationRepository;
use App\Repositories\MovieRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);

        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
