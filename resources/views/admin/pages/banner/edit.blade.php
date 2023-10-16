@extends('admin.layouts.master')
@section('content')
    <form action="{{route("admin.banner.update",$banner->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <div class="card mb-4">
                <h5 class="card-header mb-3">تغیرات کردن بنر  </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 w-25">
                            <p>عکس قدیمی</p>
                            <img class="img-fluid" src="{{ asset("uploads/$banner->image")}}">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">  تصویر جدید</label>

                        <div class="col-md-10">
                            <input class="form-control mb-2" name="image" type="file"  value="{{ old('image',$banner->image) }}">
                            @error('image')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">ادرس</label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" placeholder="ادرس  را وارد کنید ..." name="url" value="{{ old('url' , $banner->url) }}" >
                            @error('url')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="m-auto float-end">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">بازگشت</a>
                        <button type="submit" class="btn btn-success">تغییر  کردن</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section("script")
    @include("admin.alert.success")
@endsection
