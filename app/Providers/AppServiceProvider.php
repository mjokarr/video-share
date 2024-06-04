<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        # Bad Method to rewrite laravel email tipe:

        // VerifyEmail::toMailUsing(function($notifiable, $url)
        // {
        //     return (new MailMessage)
        //     ->line('new line')
        //     ->action('verify', $url);
        // });

    }

}
