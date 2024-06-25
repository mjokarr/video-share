<?php

namespace App\Observers;

use App\Models\video;
use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    /**
     * Handle the video "created" event.
     */
    public function created(video $video): void
    {
        //
    }

    /**
     * Handle the video "updated" event.
     */
    public function updated(video $video): void
    {
        if($video->wasChanged('path'))
        {
            Storage::delete($video->getOriginal('path'));
        }
    }

    /**
     * Handle the video "deleted" event.
     */
    public function deleted(video $video): void
    {
        //
    }

    /**
     * Handle the video "restored" event.
     */
    public function restored(video $video): void
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     */
    public function forceDeleted(video $video): void
    {
        //
    }
}
