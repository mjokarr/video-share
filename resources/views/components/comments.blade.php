{{-- @foreach($videos->comments as $comment) --}}
{{-- <li>
    <div class="post_author">
        <div class="img_in">
            <a href="#"><img src="{{ $comment->user->gravatar }}" alt=""></a>
        </div>
        <a href="#" class="author-name">{{ $comment->user->name }}</a>
        <time datetime="2017-03-24T18:18">{{ $comment->created_at }}</time>
    </div>
    <p>{{ $comment->body }}</p> --}}
    {{-- <div style="display: flow; padding: 5px 5px 0 0;">
        <a class="deslike" style="color: #66c0c2" href="{{ route('video.dislike', $videos) }}">{{ $comment->dislike_count }}<i class="fa fa-thumbs-down"></i></a>
        <a class="like" style="color: #aaaaaa;margin-right: 5px" href="{{ route('video.like', $videos) }}">{{ $comment->like_count }}<i class="fa fa-thumbs-up"></i></a>
    </div> --}}
    {{-- <a href="#" class="reply">پاسخ</a> --}}

    {{-- <ul class="children">
        <li>
            <div class="post_author">
                <div class="img_in">
                    <a href="#"><img src="demo_img/c2.jpg" alt=""></a>
                </div>
                <a href="#" class="author-name">بهمن نجاتی</a>
                <time datetime="2017-03-24T18:18">مرداد 27, 1397 - 11:00</time>
            </div>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                سطرآنچنان که لازم است</p>
            <a href="#" class="reply">پاسخ</a>
        </li>
    </ul> --}}
{{-- </li> --}}
{{-- @endforeach --}}
