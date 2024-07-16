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

        # to dont deletion wen we use soft deletse, we should set this condition.
        if($video->wasChanged('path'))
        {
            Storage::delete($video->getOriginal('path'));
        }
    }

    /**
     * Handle the video "deleted" event.
     */
    public function deleted(video $video)
    {
        if($video->trashed()) return true;

        Storage::delete($video->path);
        // Storage::delete($video->thumbnail);
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
        Storage::delete($video->path);
    }
}
