@extends('layout')
@section('content')
            <div id="upload">
                <div class="row">
                    <!-- upload -->
                    <div class="col-md-8">
						<h1 class="page-title"><span>آپلود</span> فیلم</h1>
						<form action="/videos" method="POST">
                            @csrf
                        	<div class="row">
                            	<div class="col-md-6">
                                	<label>عنوان</label>
                                    <input name="name" type="text" class="form-control" placeholder="عنوان">
                                </div>
                            	<div class="col-md-6">
                                	<label>مدت زمان</label>
                                    <input name="length" type="text" class="form-control" placeholder="مدت زمان">
                                </div>
                            	<div class="col-md-6">
                                	<label>نام یکتا</label>
                                    <input name="slug"  type="text" class="form-control" placeholder="نام یکتا">
                                </div>
                            	<div class="col-md-6">
                                    <label>آدرس ویدئو</label>
                                    <input name="url" type="text" class="form-control" placeholder="آدرس ویدئو">
                                </div>
                                <div class="col-md-6">
                                    <label>تصویر بندانگشتی</label>
                                    <input name="thumbnail" type="text" class="form-control" placeholder="تصویر بندانگشتی">
                                </div>
                            	<div class="col-md-12">
                                	<label>توضیحات</label>
                                    <textarea name="description" class="form-control" rows="4"  placeholder="توضیح"></textarea>
                                </div>
                            	{{-- <div class="col-md-6">
                                	<label>تصویر</label>
                                    <input id="featured_image" type="file" class="file">
                                </div> --}}
                            	<div class="col-md-6">
                                    <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
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
