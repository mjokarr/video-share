<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all()->random(6);
        $mostViewedVideos = Video::all()->random(6);
        $mostPopularVideos = Video::all()->random(6);
        return view('videos.index', compact('videos', 'mostViewedVideos', 'mostPopularVideos'));
    }

    # Create Video Page.
    public function create()
    {
        return view('videos.create');
    }

    # Get Data Validations From App\Http\Requests\StoreVideoRequest, Store, Redirection, and show message to user.
    public function store(StoreVideoRequest $request)
    {

        Video::create($request->all());

        return redirect()->route('index')->with('alert', __('messages.success'));
    }

    # Show Video Page and get Data From Illuminate Request file. | Notice: use Video Model Instead of int parameter to laravel auto validation and show 404 Error
    public function show(Request $request, Video $video)
    {
        // $videos = Video::find($video);

        return view('videos.show', ['videos' => $video]);
    }

    # Show edit video page and set a new data with redirection plus slug Instead of int ID parameter and that message to user.
    public function edit(Video $video)
    {
        // dd($video);
        return view('videos.edit', ['video' => $video]);

    }

    # this is a simple update only :)
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());
        return redirect()->route('videos.show', $video->slug)->with('alert', __('messages.video_edit_success'));
    }
}
