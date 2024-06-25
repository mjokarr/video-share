<?php

namespace App\Observers;

use App\Models\Like;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     */
    public function created(Like $like): void
    {
        // dd($like);
    }

    /**
     * Handle the Like "updated" event.
     */
    public function updated(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "deleted" event.
     */
    public function deleted(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "restored" event.
     */
    public function restored(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "force deleted" event.
     */
    public function forceDeleted(Like $like): void
    {
        //
    }
}
