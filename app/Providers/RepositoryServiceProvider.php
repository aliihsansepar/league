<?php

namespace App\Providers;

use App\Interfaces\FixtureInterface;
use App\Interfaces\MatchInterface;
use App\Interfaces\TeamInterface;
use App\Repositories\FixtureRepository;
use App\Repositories\MatchRepository;
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
        $this->app->bind(MatchInterface::class, MatchRepository::class);
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
