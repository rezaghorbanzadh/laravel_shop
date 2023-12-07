@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('admin.product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <div class="card mb-4">
                <h5 class="card-header mb-3">اضافه کردن  محصول  </h5>
                <div class="card-body">
                   {{-- name--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">نام    محصول</label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- color--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">رنگ </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="color" type="color" value="{{ old('color') }}">
                            @error('color')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- imsge product--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">عکس محصول </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="img_product" type="file" value="{{ old('img_product') }}">
                            @error('img_product')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- discount--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">   درصد تخفیف </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="discount" type="text" value="{{ old('discount') }}">
                            @error('discount')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- oldprice--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">قیمت قبل تخفیف </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="oldprice" type="text" value="{{ old('oldprice') }}">
                            @error('oldprice')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- price--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">قیمت آخر </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="price" type="text" value="{{ old('price') }}">
                            @error('price')
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
                    {{-- inventory--}}
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">   درصد تخفیف </label>
                        <div class="col-md-10">
                            <input class="form-control mb-2" name="inventory" type="text" value="{{ old('inventory') }}">
                            @error('inventory')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت  محصول</label>
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


                    <div class="m-auto float-end">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-primary">بازگشت</a>
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

