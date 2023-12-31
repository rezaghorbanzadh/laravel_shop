@extends('admin.layouts.master')
@section('content')
    @include("admin.alert.success")
    <div class="row mb-5">

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>آیدی</th>
                <th> توضیحات  </th>
                <th>زیر دسته</th>
                <th>نام نویسنده </th>
                <th>نام محصول </th>
                <th>نوع کامنت</th>
                <th>تعداد دیده شدن</th>
                <th>تایید شده</th>
                <th> وضعیت</th>
                <th> تایید توسط ادمین</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($comment as $comments)
                <tr>
                    <th>{{ $comments->id }}</th>
                    <td>{{ Illuminate\Support\Str::limit($comments->body, 10, ' ...') }}</td>
                    @if ($comments->parent_id !== null)
                        <td class="text-warning"> {{ $comments->parent->id }}- {{ $comments->parent->body }}</td>
                    @else
                        <td class="text-danger">ندارد</td>
                    @endif
                    @if ($comments->author_id !== null)
                        <td class="text-warning"> {{ $comments->author->id }}- {{ $comments->author->username }}</td>
                    @else
                        <td class="text-danger">ندارد</td>
                    @endif
                    @if ($comments->product_id !== null)
                        <td class="text-warning"> {{  $comments->product->id }}- {{ $comments->product->name }}</td>
                    @else
                        <td class="text-danger">ندارد</td>
                    @endif

                    <td>{{ $comments->commentable_type }}</td>
                    <td>{{ $comments->seen }}</td>
                    @if($comments->approved == 0)
                    <td style="color: red">تایید نشده</td>
                    @else
                        <td style="color: greenyellow">تایید  شده</td>
                    @endif
                    @if ($comments->status == 1)
                        <td>
                            <a href="{{route("admin.comment.change",$comments->id)}}"
                               class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                        </td>
                    @else
                        <td>
                            <a href="{{route("admin.comment.change",$comments->id)}}"
                               class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                        </td>
                    @endif
                    @if ($comments->approved ==0)
                        <td>
                            <a href="{{route("admin.approved.change",$comments->id)}}"
                               class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>

                        </td>
                    @else
                        <td>
                            <a href="{{route("admin.approved.change",$comments->id)}}"
                               class="btn rounded-pill btn-sm btn-success waves-effect waves-light">تایید</a>
                        </td>
                    @endif

                    <td>


                        <form id="deleteButton" class="d-inline" action="{{route("admin.comment.destroy",$comments->id)}}"
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

