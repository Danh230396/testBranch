
@extends('admin.master')
@section('pageHeader', 'Product')
@section('function', 'list')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products AS $product)
        <tr class="odd gradeX" align="center">
            <td>1</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->price !!} VNĐ</td>
            <td>
                <?php
                $cate = DB::table('categories')->where('id', $product->cate_id)->first();
                echo $cate->name;
                ?>
            </td>
            <td>20/6/2016</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.products.delete', $product->id) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.products.getEdit', $product->id) !!}">Edit</a></td>
        </tr>
        @endforeach

<!--                            <tr class="even gradeC" align="center">
    <td>2</td>
    <td>Áo Thun Polo</td>
    <td>250.000 VNĐ</td>
    <td>1 Hours Age</td>
    <td>Ẩn</td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
</tr>-->

    </tbody>
</table>
@endsection
