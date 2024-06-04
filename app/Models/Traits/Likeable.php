<?php
namespace App\Models\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;


Trait Likeable
{
    public function likes(): MorphMany
    {
        return $this->MorphMany(Like::class, 'likeable');
    }

    protected function getLikeCountAttribute()
    {
        return $this->likes()
        ->where('vote', 1)
        ->count();
    }

    protected function getDislikeCountAttribute()
    {
        return $this->likes()
        ->where('vote', -1)
        ->count();
    }
}
