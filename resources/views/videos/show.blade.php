@extends('layout')
@section('content')
<div class="row">
    <!-- Watch -->
    <x-validation-errors></x-validation-errors>
    <x-alert></x-alert>
    <div class="col-md-8">

        <div id="watch">
            <!-- Video Player -->
            <h1 class="video-title">{{ $videos->name }}</h1>
            <div class="video-code">
                <video controls style="height: 100%; width: 100%;">
                    <source
                        src="{{ $videos->url }}"
                        type="video/mp4">
                </video>
            </div><!-- // video-code -->


            <div>
                <br>
                <p style="margin-right: 10px; color: #4949609e; line-height: 10px; line-height: normal;">
                    {{ $videos->description }}
                </p>
            </div>

            <div class="video-share">
            @auth
                <ul class="like">
                    <li><a class="deslike" href="{{ route('video.dislike', $videos) }}">{{ $videos->dislike_count }}<i class="fa fa-thumbs-down"></i></a></li>
                    <li><a class="like" href="{{ route('video.like', $videos) }}">{{ $videos->like_count }}<i class="fa fa-thumbs-up"></i></a></li>
                </ul>
            @endauth
                <ul class="social_link">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li><a class="youtube" href="#"><i class="fa fa-youtube-play"
                                aria-hidden="true"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                </ul><!-- // Social -->
            </div><!-- // video-share -->
            <!-- // Video Player -->


            <!-- Chanels Item -->
            <div class="chanel-item">
                <div class="chanel-thumb">
                    <a href="#"><img style="border-radius:6px;" src="{{ $videos->owner_avatar }}" alt=""></a>
                </div>
                <div class="chanel-info">
                    <a class="title" href="#">{{ $videos->owner_name }}</a>
                    <span class="subscribers">436,414 اشتراک</span>
                </div>
                <a href="#" class="subscribe">اشتراک</a>
            </div>
            <!-- // Chanels Item -->


            <!-- Comments -->
            <div id="comments" class="post-comments">
                <h3 class="post-box-title"><span>{{ $videos->comments->count() }}</span> نظر</h3>
                <ul class="comments-list">
                    <x-comments :videos='$videos' />

                </ul>

                @auth
                <h3 class="post-box-title">ارسال نظرات</h3>
                <form action="{{ route('comments.store', $videos) }}" method="post">
                    @csrf
                    <textarea class="form-control" rows="8" name="body" id="Message" placeholder="متن پیام"></textarea>
                    <button type="submit" id="contact_submit" class="btn btn-dm">ثبت نظر</button>
                </form>
                @endauth
            </div>
            <!-- // Comments -->


        </div><!-- // watch -->
    </div><!-- // col-md-8 -->
    <!-- // Watch -->

    <!-- Related Posts-->
    <div class="col-md-4">

        <x-related-videos :videos='$videos'/>

    </div><!-- // col-md-4 -->
    <!-- // Related Posts -->
</div><!-- // row -->

@endsection
