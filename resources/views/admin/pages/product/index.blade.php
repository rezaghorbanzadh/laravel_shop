@extends('admin.layouts.master')
@section('content')
    @include("admin.alert.success")
    <div class="row mb-5">
        <div>
            <a class="btn btn-success mb-4" href="{{route("admin.product.create")}}">ساخت   محصول   جدبد</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>آیدی</th>
                <th>نام</th>
                <th>رنگ</th>
                <th> قیمت اخر </th>
                <th>قیمت قبلی</th>
                <th>  توضیحات</th>
                <th>  تعداد</th>
                <th> عکس محصول</th>
                <th> فروشنده محصول</th>
                <th> درصد تخفیف</th>
                <th>  وضعیت  </th>
            </tr>
            </thead>
            <tbody>

            @foreach ($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->oldprice }}</td>
                    <td>{{ Illuminate\Support\Str::limit($product->description, 10, ' ...') }}</td>
                    <td>{{ $product->inventory }}</td>
                    <td>
                        @if (!empty($product->img_product))
                            <img style="width: 80px;" src="{{ asset("uploads/$product->img_product")}}" alt="{{ $product->id }}">
                        @else
                            <span class="text-danger">ندارد</span>
                        @endif
                    </td>
                    <td>{{ $product->user_id }}</td>


                    @if ($product->discount !== null)
                        <td class="text-warning"> % {{ $product->discount }}</td>
                    @else
                        <td class="text-danger"> تخفیف ندارد</td>
                    @endif



                    @if ($product->status == 1)
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
                        <a href="{{route("admin.product.edit",$product->id)}}"
                           class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                        <form id="deleteButton" class="d-inline" action="{{route("admin.product.destroy",$product->id)}}"
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

