<?php
namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Middleware\CheckVerifyEmail;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Validation\Rules\Exists;

class VideoController extends Controller
{
    // public function __construct()
    // {
    //     $this->Middleware(CheckVerifyEmail::class);
    // }

    public function index()
    {
        $videos = Video::all()->random(6);
        $mostViewedVideos = Video::all()->random(6);
        $mostPopularVideos = Video::all()->random(6);
        // return view('videos.index', compact('videos', 'mostViewedVideos', 'mostPopularVideos'));
        return view()->composer('videos.index', function ($view) {

        });
    }

    # Create Video Page.
    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    # Get Data Validations From App\Http\Requests\StoreVideoRequest, Store, Redirection, and show message to user.
    public function store(StoreVideoRequest $request)
    {
        $path = Storage::putFile('/public', $request->file('file'));
        $request->merge([
            'url' => $path,
        ]);
        // Video::create($request->all());
        $request->user()->videos()->create($request->all());
        return redirect()->route('index')->with('alert', __('messages.success'));
    }

    # Show Video Page and get Data From Illuminate Request file. | Notice: use Video Model Instead of int parameter to laravel auto validation and show 404 Error
    public function show(Request $request, Video $video)
    {
        $video->load('comments.user');

        return view('videos.show', ['videos' => $video]);
    }

    # Show edit video page and set a new data with redirection plus slug Instead of int ID parameter and that message to user.
    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('videos.edit', ['video' => $video, 'categories' => $categories]);



    }

    # this is a simple update only :)
    public function update(UpdateVideoRequest $request, Video $video)
    {
        if($request->hasFile('file'))
        {
            $path = Storage::putFile('/public', $request->file('file'));
            $request->merge([
                'url' => $path,
            ]);
        }
        $video->update($request->all());
        return redirect()->route('videos.show', $video->slug)->with('alert', __('messages.video_edit_success'));
    }
}
