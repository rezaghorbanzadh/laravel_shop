@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('admin.banner.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <div class="card mb-4">
                <h5 class="card-header mb-3">اضافه کردن بنر  </h5>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">عکس بنر </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="image" type="file"  value="{{ old('image') }}">
                            @error('image')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">ادرس</label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" placeholder="ادرس  را وارد کنید ..." name="url" >{{ old('url') }}
                            @error('url')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">عنوان</label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" placeholder="عنوان  را وارد کنید ..." name="title" >{{ old('title') }}
                            @error('title')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">موقعیت</label>
                        <div class="col-md-10">
                            <select class="form-control mb-2" name="position" {{ old('position') }}>
                                <option value="1">بنر اصلی</option>
                                <option value="1">کنار اسلاید شو اصلی</option>
                                <option value="2"> دو بنر تبلیغاتی بین دو اسلاید شو   </option>
                                <option value="3"> بنر بزرگ تبلیغاتی پایین   </option>
                            </select>
                            @error('position')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label"> وضعیت</label>
                        <div class="col-md-10">
                            <select class="form-control mb-2" name="status" {{ old('status') }}>
                                <option value="0">غیر فعال </option>
                                <option value="1">فعال</option>
                               
                            </select>
                            @error('status')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="m-auto float-end">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">بازگشت</a>
                        <button type="submit" class="btn btn-success">اضافه کردن</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section("script")
    @include("admin.alert.success")
@endsection
