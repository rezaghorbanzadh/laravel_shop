@extends('admin.layouts.master')
@section('content')
    @include("admin.alert.success")
    <div class="row mb-5">

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>آیدی</th>
                <th>نام</th>
                <th>ایمیل</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($user as $users)
                <tr>
                    <th>{{ $users->id }}</th>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->email }}</td>


                    <td>
                        <form id="deleteButton" class="d-inline" action="{{route("admin.user.destroy",$users->id)}}"
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

