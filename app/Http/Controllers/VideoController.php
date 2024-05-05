<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;
class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all()->random(6);
        $mostViewedVideos = Video::all()->random(6);
        $mostPopularVideos = Video::all()->random(6);
        return view('videos.index', compact('videos', 'mostViewedVideos', 'mostPopularVideos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(StoreVideoRequest $request)
    {

        Video::create($request->all());

        return redirect()->route('index')->with('alert', __('messages.success'));
    }

}
