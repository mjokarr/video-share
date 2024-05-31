<?php

namespace App\Listeners;

use App\Events\VideoCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMail
{
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
         dump('Hello From Send Mail: ' . $event->video->name);
    }
}
