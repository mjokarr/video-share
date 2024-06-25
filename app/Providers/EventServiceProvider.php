<?php

namespace App\Providers;

use App\Observers\LikeObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Like;
class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Like::observe(LikeObserver::class);
    }
}
