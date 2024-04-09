<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
class IndexController extends Controller
{
    public function index()
    {

        $videos = Video::latest()->take(6)->get();
        $mostPopularVideos = Video::all()->random(6);
        $mostViewedVideos = Video::all()->random(6);
        return view('index', compact('videos', 'mostPopularVideos', 'mostViewedVideos'));
    }
}
