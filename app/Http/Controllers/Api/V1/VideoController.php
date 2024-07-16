<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return new VideoResource($video);
    // return $video;
    }

    public function index(Request $request, Video $video)
    {
        $videos = $video->filter($request->all())->paginate();
        return VideoResource::collection($videos);
    }

    public function store(StoreVideoRequest $request)
    {

        $path = Storage::putFile('/public', $request->file('file'));

        $request->merge([
            'path' => $path,
        ]);

        // dd($request->all());
        $user = User::first();

        $request->user()->videos()->create(User::first(), $request->all());
        return response()->json([
            'message' => 'Video Created successfully',
        ], 201);
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        // dd($request->all());
        if($request->hasFile('file'))
        {
            $path = Storage::putFile('/public', $request->file('file'));
            $request->merge([
                'path' => $path,
            ]);
        }

        $video->update($request->all());

        return response()->json([
            'message' => 'the video was successfully updated',
        ], 204);
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return Response()->json([
            'message' => 'the video was successfully deleted',
        ], 200);
    }
}
