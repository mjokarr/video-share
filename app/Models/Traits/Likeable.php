<?php
namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\MorphMany;



Trait Likeable
{
    public function likes(): MorphMany
    {
        return $this->MorphMany(Like::class, 'likeable');
    }

    # Get likes count with cache.
    protected function getLikeCountAttribute()
    {
        $cacheKeyName = 'likes_count_for' . class_basename($this) . '_' . $this->id;
        return Cache::remember($cacheKeyName, 3600, function ()
        {
            return $this->likes()
            ->where('vote', 1)
            ->count();
        });
    }

    # Get dislikes count with cache.
    protected function getDislikeCountAttribute()
    {
        $cacheKeyName = 'dislikes_count_for' . class_basename($this) . '_' . $this->id;
        return Cache::remember($cacheKeyName, 3600, function ()
        {
            return $this->likes()
            ->where('vote', -1)
            ->count();
        });
    }

    public function likedBy(User $user)
    {
        if($this->isDislikedBy($user))
        {
            return back()->with('alert', __('messages.you-can-like-or-dislike-once'));
        }

        if ($this->islikedBy($user))
        {
            return $this->gettingLikeBack($user);
        }

        return  $this->likes()->create([
            'vote' => 1,
            'user_id' => $user->id,
        ]);
    }

    public function dislikedBy(User $user)
    {
        if($this->isLikedBy($user))
        {
            return back()->with('alert', __('messages.you-can-like-or-dislike-once'));
        }

        if ($this->isdislikedBy($user))
        {
            return $this->gettingDislikeBack($user);
        }


        return  $this->likes()->create([
            'vote' => -1,
            'user_id' => $user->id,
        ]);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()
        ->where('vote', 1)
        ->where('user_id', $user->id)
        ->exists();
    }

    public function isDislikedBy(User $user)
    {
        return $this->likes()
        ->where('vote', -1)
        ->where('user_id', $user->id)
        ->exists();
    }

    public function gettingLikeBack(User $user)
    {
        return $this->likes()
        ->where('user_id', $user->id)
        ->where('vote', 1)
        ->delete();
    }

    public function gettingDislikeBack(User $user)
    {
        return $this->likes()
        ->where('user_id', $user->id)
        ->where('vote', -1)
        ->delete();
    }
}
