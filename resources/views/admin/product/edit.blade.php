@extends('admin.master')
@section('pageHeader', 'Sản phẩm')
@section('function', 'Sửa')
@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- /.col-lg-12 -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="category">
                <option value="">Please Choose Category</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tên</label>
            <input class="form-control" name="txtName" placeholder="Please Enter name" value="{{ old('txtName', isset($product->name) ? $product->name : null) }}"/>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 form-group">
                <label>Giá mua</label>
                <input class="form-control" name="txtPrice" required placeholder="Please Enter price" value="{{ old('txtPrice', isset($product->price) ? $product->price : null) }}"/>
            </div>
            <div class="col-md-6 form-group">
                <label>Giá bán</label>
                <input class="form-control" name="txtSalePrice" required placeholder="Please Enter sale price" value="{{ old('txtSalePrice', isset($product->saleprice) ? $product->saleprice : null) }}"/>
            </div>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input name="txtQuantity" value="{{ old('txtQuantity', isset($product->quantity) ? $product->quantity : null) }}" required class="form-control" min="0" type="number" placeholder="Please Enter quantity"/>
        </div>
        <div class="form-group">
            <label>Giới thiệu</label>
            <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($product->intro) ? $product->intro : null) }}</textarea>
            <!-- <script type="text/javascript">CKEDITOR.replace('txtIntro')</script> -->
        </div>
        
        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset('resources/upload/images/products/avatar/'. $product->image) }}" width="200px">
            </div>
            <div class="col-md-5">
                <label>Hình đại diện</label>
                <input type="file" name="fImages" value="{{ $product->image }}">
            </div>
        </div>
        <br />
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" rows="3" name="description">{{ old('description', isset($product->description) ? $product->description : null) }}</textarea>
        </div>
        <div class="form-group">
            <label>Từ khóa</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{{ old('txtOrder', isset($product->keywords) ? $product->keywords : null) }}" />
        </div>
        
        <button type="submit" class="btn btn-default">Sửa</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>

    </div>
    <div class="col-lg-5 data_image">
        @foreach($productImages AS $image)
            <div class="image">
                <img src="{{ asset($image->path) }}">
                <span><i class="fa fa-remove"></i></span>
                <input type="file" name="imageDetails[]">
            </div>
        @endforeach
    </div>
</form>
@endsection
