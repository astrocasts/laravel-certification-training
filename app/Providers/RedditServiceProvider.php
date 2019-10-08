<?php

namespace App\Providers;

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
        $this->app->singleton(RedditClient::class, GuzzleRedditClient::class);
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
