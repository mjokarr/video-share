<?php

namespace App\Listeners;

use App\Events\VideoCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoProccesse // implements ShouldQueue
{
    // public $queue = 'low';
    // public $connection = 'database';
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VideoCreate $event): void
    {
        dump('there is an email in here!! ' . 'it is for you? : ' . $event->video->user->email);
    }
}
