<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Video $video)
    {
        ##### NOTICE:
        # We can write this code that writen bottom, in StoreCommentRequest, dinamicly.
        #####

        // Gate::authorize('create', [Comment::class, $video]);
        $video->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);
        return back()->with('alert', __('messages.your-comment-was-successfully-sent'));
    }
}
