<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use App\Models\comment;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Video $video): mixed
    {
        return $video->user_id != $user->id ? Response::allow() : Response::deny(__('messages.you-cant-set-a-comment-to-yourself-video'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, comment $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, comment $comment): bool
    {
        //
    }
}
