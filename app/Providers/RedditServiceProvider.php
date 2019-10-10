<?php

namespace App\Providers;

use App\Services\Reddit\CacheRedditClient;
use App\Services\Reddit\GuzzleRedditClient;
use App\Services\Reddit\RedditClient;
use Illuminate\Support\ServiceProvider;

class RedditServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CacheRedditClient::class)
            ->needs(RedditClient::class)
            ->give(GuzzleRedditClient::class);

        $this->app->singleton(RedditClient::class, CacheRedditClient::class);
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
