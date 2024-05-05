@extends('layout')
@section('content')
            <div id="upload">
                <div class="row">

                    <x-validation-errors></x-validation-errors>
                    <!-- upload -->
                    <div class="col-md-8">
						<h1 class="page-title"><span>@lang('videos.upload')</span> @lang('videos.video')</h1>
						<form action="/videos" method="POST">
                            @csrf
                        	<div class="row">
                            	<div class="col-md-6">
                                	<label>@lang('videos.name')</label>
                                    <input name="name" type="text" class="form-control" placeholder="@lang('videos.name')">
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.length')</label>
                                    <input name="length" type="text" class="form-control" placeholder="@lang('videos.length')">
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.slug')</label>
                                    <input name="slug"  type="text" class="form-control" placeholder="@lang('videos.slug')">
                                </div>
                            	<div class="col-md-6">
                                    <label>@lang('videos.url')</label>
                                    <input name="url" type="text" class="form-control" placeholder="@lang('videos.url')">
                                </div>
                                <div class="col-md-6">
                                    <label>@lang('videos.thumbnail')</label>
                                    <input name="thumbnail" type="text" class="form-control" placeholder="@lang('videos.thumbnail')">
                                </div>
                            	<div class="col-md-12">
                                	<label>@lang('videos.description')</label>
                                    <textarea name="description" class="form-control" rows="4"  placeholder="@lang('videos.description')"></textarea>
                                </div>
                            	{{-- <div class="col-md-6">
                                	<label>تصویر</label>
                                    <input id="featured_image" type="file" class="file">
                                </div> --}}
                            	<div class="col-md-6">
                                    <button type="submit" id="contact_submit" class="btn btn-dm">@lang('videos.save')</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- // col-md-8 -->

                    <div class="col-md-4">
                    	<a href="#"><img src="{{Vite::asset('resources/demo_img/upload-adv.png')}}" alt=""></a>
                    </div><!-- // col-md-8 -->
                    <!-- // upload -->
                </div><!-- // row -->
            </div>
@endsection()
