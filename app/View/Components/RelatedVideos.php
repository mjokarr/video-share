<?php

namespace App\View\Components;

use App\Models\Video;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedVideos extends Component
{
    /**
     * Create a new component instance.
     */
    public $videos;

    public function __construct(Video $video)
    {

        $this->videos = $video->relatedVideos(10);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.related-videos');
    }
}
