<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use App\Policies\VideoPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $policies = [
        Video::class => VideoPolicy::class,
        Comment::class => CommentPolicy::class,
    ];


    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
