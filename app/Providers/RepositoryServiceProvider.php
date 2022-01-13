<?php

namespace App\Providers;

use App\Interfaces\FixtureInterface;
use App\Interfaces\GameInterface;
use App\Interfaces\TeamInterface;
use App\Repositories\FixtureRepository;
use App\Repositories\GameRepository;
use App\Repositories\TeamRepository;
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
        $this->app->bind(FixtureInterface::class, FixtureRepository::class);
        $this->app->bind(GameInterface::class, GameRepository::class);
        $this->app->bind(TeamInterface::class, TeamRepository::class);
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
