<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $requst)
    {
        Video::create($requst->all());

        return redirect()->route('index')->with('alert', 'ویدئوی شما با موفقیت ذخیره شد');
    }

}
