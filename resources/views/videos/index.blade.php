@extends('layout')
@section('content')

                <h1 class="new-video-title"><i class="fa fa-bolt"></i>{{ $title }}</h1>
                <div class="row">

                    @foreach ($videos as $video)
                    <x-video-box :video="$video"></x-video-box>
                    @endforeach

                </div>
                {{-- <h1>hello from this place</h1> --}}
                <div dir="rtl" class="text-center">
                    {{ $videos->links('pagination::bootstrap-4') }}
                </div>
@endsection
