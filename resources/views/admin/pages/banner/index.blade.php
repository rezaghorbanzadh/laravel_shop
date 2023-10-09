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
                <th>نام</th>
                <th>توضیحات</th>
                <th>زیر دسته</th>
                <th>اسلاگ</th>
                <th>وضعیت</th>
                <th>آپشن ها</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($banners as $banner)
                <tr>
                    <th>{{ $banner->id }}</th>
                    <td>{{ $banner->name }}</td>
                    <td>{{ Illuminate\Support\Str::limit($banner->description, 10, ' ...') }}</td>
                    @if ($banner->parent_id !== null)
                        <td class="text-warning"> {{ $banner->parent->id }}- {{ $banner->parent->name }}</td>
                    @else
                        <td class="text-danger">ندارد</td>
                    @endif

                    <td>{{ $banner->slug }}</td>

                    @if ($banner->status == 1)
                        <td>
                            <a href="{{route("admin.category.change",$banner->id)}}"
                               class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                        </td>
                    @else
                        <td>
                            <a href="{{route("admin.category.change",$banner->id)}}"
                               class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                        </td>
                    @endif

                    <td>
                        <a href="{{route("admin.category.edit",$banner->id)}}"
                           class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                        <form id="deleteButton" class="d-inline" action="{{route("admin.category.destroy",$banner->id)}}"
                              method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="btn rounded-pill btn-sm btn-danger waves-effect waves-light deleteButton"
                                    id="deleteButton">حذف</button>
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

