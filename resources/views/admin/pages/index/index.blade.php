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


                <tr>
                    <th></th>
                    <td></td>
                    <td>{</td>
                    <td>{</td>
                    <td>
{{--                        <img src="{{ asset($Categories->image['indexArray'][$Categories->image['currentImage']] ) }}" alt="" width="100" height="50">--}}
                    </td>
                    <td>}</td>
                    <td>
                        <label>
                            <input id="" onchange="changeStatus()">
                        </label>
                    </td>
                    <td class="width-16-rem text-left">
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                        <form class="d-inline" action="" method="post">


                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                        </form>
                    </td>
                </tr>




            </tbody>
        </table>

    </div>
@endsection
