@extends('admin.layouts.master')

@section('content')

    @include("admin.alert.success")

    <div class="row mb-5">
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

            @foreach ($category as $categories)
                <tr>
                    <th>{{ $categories->id }}</th>
                    <td>{{ $categories->name }}</td>
                    <td>{{ \Str::limit($categories->description, 10, ' ...') }}</td>

                    @if ($categories->parent_id !== null)
                        <td class="text-warning"> {{ $categories->parent->id }}- {{ $categories->parent->name }}</td>
                    @else
                        <td class="text-danger">ندارد</td>
                    @endif

                    <td>{{ $categories->slug }}</td>

                    @if ($categories->status == 1)
                        <td>
                            <a href=""
                               class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                        </td>
                    @else
                        <td>
                            <a href=""
                               class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                        </td>
                    @endif

                    <td>
                        <a href="{{route("admin.category.edit",$categories->id)}}"
                           class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                        <form id="deleteButton" class="d-inline" action="{{route("admin.category.destroy",$categories->id)}}"
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

