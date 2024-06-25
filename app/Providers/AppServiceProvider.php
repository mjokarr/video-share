<?php

namespace App\Providers;

use Route;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        // $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Route::bind('likeable_id', function($value, $route)
        {
            $modelName = 'App\\Models\\' . ucfirst($route->parameters['likeable_type']);
            $routeKey = (new $modelName())->getRouteKeyName();

            return $modelName::where($routeKey, $route->parameters['likeable_id'])->first();
        });



        # Bad Method to rewrite laravel email tipe:

        // VerifyEmail::toMailUsing(function($notifiable, $url)
        // {
        //     return (new MailMessage)
        //     ->line('new line')
        //     ->action('verify', $url);
        // });

    }

}
