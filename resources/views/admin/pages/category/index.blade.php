@extends('admin.layouts.master')

@section('content')

    <div class="row mb-5">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>نام دسته بندی</th>
                <th>توضیحات</th>
                <th>اسلاگ</th>
                <th>عکس</th>
                <th>تگ ها</th>
                <th>وضعیت</th>
                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($category as $key => $Categories)

                <tr>
                    <th>{{ $key+=1 }}</th>
                    <td>{{ $Categories->name }}</td>
                    <td>{{ $Categories->description }}</td>
                    <td>{{ $Categories->slug }}</td>
                    <td>
{{--                        <img src="{{ asset($Categories->image['indexArray'][$Categories->image['currentImage']] ) }}" alt="" width="100" height="50">--}}
                    </td>
                    <td>{{ $Categories->tags }}</td>
                    <td>
                        <label>
                            <input id="{{ $Categories->id }}" onchange="changeStatus({{ $Categories->id }})">
                        </label>
                    </td>
                    <td class="width-16-rem text-left">
                        <a href="{{ route('admin.category.edit', $Categories->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                        <form class="d-inline" action="{{ route('admin.category.destroy', $Categories->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>

    </div>
@endsection
