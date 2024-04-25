<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Video;
class LatestVideos extends Component
{

    public $videos;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->videos = Video::latest()->take(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-videos');
    }
}
