@extends('admin.layouts.master')
@section('content')
    @include("admin.alert.success")
    <div class="row mb-5">
        <div>
            <a class="btn btn-success mb-4" href="{{route("admin.banner.create")}}">ساخت دسته بندی جدبد</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>آیدی</th>
                <th>ادرس</th>
                <th>عنوان</th>
                <th>موقعیت </th>
                <th>وضعیت </th>
                <th>تصویر </th>

            </tr>
            </thead>
            <tbody>

            @foreach ($banners as $banner)
                <tr>
                    <th>{{ $banner->id }}</th>
                    <td>{{ $banner->url }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $position[$banner->position] }}</td>
                    <td>{{ $banner->status }}</td>

                    <td>
                        @if (!empty($banner->image))
                            <img style="width: 80px;" src="{{ asset("uploads/$banner->image")}}" alt="{{ $banner->id }}">
                        @else
                            <span class="text-danger">ندارد</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route("admin.banner.edit",$banner->id)}}"
                           class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                        <form id="deleteButton" class="d-inline" action="{{route("admin.banner.destroy",$banner->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn rounded-pill btn-sm btn-danger waves-effect waves-light deleteButton" id="deleteButton">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section("script")
    @include("admin.alert.success")
@endsection

