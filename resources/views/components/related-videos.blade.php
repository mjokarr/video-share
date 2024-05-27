<div id="related-posts">

    @foreach ($videos as $video)

    <div class="related-video-item">
            <div class="thumb">
                <small class="time">{{ $video->lengthToHuman }}</small>
                <a href="{{ route('videos.show', $video->slug) }}"><img src="{{ $video->thumbnail }}" alt=""></a>
            </div>
            <a href="{{ route('videos.show', $video->slug) }}" class="title">{{ $video->name }}</a>
            <a class="channel-name" href="#">کاربر<span>
                    <i class="fa fa-check-circle"></i></span></a>
        </div>
    @endforeach

</div>
