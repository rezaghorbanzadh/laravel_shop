@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('admin.category.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <div class="card mb-4">
                <h5 class="card-header mb-3">اضافه کردن دسته بندی</h5>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">نام دسته بندی</label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">توضیحات</label>
                        <div class="col-md-10">
                            <textarea  class="form-control mb-2" placeholder="توضیحات را وارد کنید ..." name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت دسته بندی</label>
                        <div class="col-md-10">
                            <select name="status" id="status" class="form-select mb-2">
                                <option  value="{{ null }}">انتخاب وضعیت</option>
                                <option value="0">غیر فعال</option>
                                <option value="1">فعال</option>
                            </select>
                            @error('status')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="parent" class="col-md-2 col-form-label">انتخاب دستبندی</label>
                        <div class="col-md-10">
                            <select id="parent_id" name="parent_id" class="form-select mb-2">
                                <option value="">انتخاب دستبندی</option>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
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

    <script src="{{asset("assets/admin-assets/ckeditor/ckeditor.js")}}"></script>


    <script>
        CKEDITOR.replace("ِdescription");

    </script>

@endsection

