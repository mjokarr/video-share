@extends('layout')
@section('content')

                <form class="mt-5" action="" method="get">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="form-inputCity">ترتیب بر اساس</label>
                            <select class="form-control" name="sortBy">
                                <option {{ request()->query('sortBy') == 'created_at' ? 'selected' : ''}} value="created_at">جدیدترین</option>
                                <option {{ request()->query('sortBy') == 'like' ? 'selected' : ''}} value="like">محبوب‌ترین</option>
                                <option {{ request()->query('sortBy') == 'length' ? 'selected' : ''}} value="length">مدت زمان ویدئو</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputState">ترتیب بر اساس</label>
                            <select id="inputState" class="form-control" name="length">
                                <option {{ request()->query('length') == null ? 'selected' : ''}} value="">همه</option>
                                <option {{ request()->query('length') == 1 ? 'selected' : ''}} value="1">کمتر از یک دقیقه</option>
                                <option {{ request()->query('length') == 2 ? 'selected' : ''}} value="2">۱ تا ۵ دقیقه</option>
                                <option {{ request()->query('length') == 3 ? 'selected' : ''}} value="3">بیشتر از ۵ دقیقه</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{ request()->query('q') }}">
                        <div class="form-group col-md-3" style="margin-top:29px">
                            <button type="submit" class="btn btn-primary">فیلتر</button>
                        </div>
                    </div>
                </form>
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
