@extends('admin.master')
@section('pageHeader', 'Sản phẩm')
@section('function', 'thêm')
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
<form action="{{ route('postAddProduct') }}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Danh mục sản phẩm</label>
            <select class="form-control" name="category">
                <option value="0">chọn danh mục</option>
                <option value="1">Áo thun</option>
                <option value="2">Áo sơ mi</option>
                <option value="3">Áo khoắc</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="txtName" required placeholder="Please Enter name" value="{{ old('txtName') }}"/>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 form-group">
                <label>Giá mua</label>
                <input class="form-control" name="txtPrice" required placeholder="Please Enter price" value="{{ old('txtPrice') }}"/>
            </div>
            <div class="col-md-6 form-group">
                <label>Giá bán</label>
                <input class="form-control" name="txtSalePrice" required placeholder="Please Enter sale price" value="{{ old('txtSalePrice') }}"/>
            </div>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input name="txtQuantity" value="{{ old('txtQuantity') }}" required class="form-control" min="0" type="number" placeholder="Please Enter quantity"/>
        </div>
        <div class="form-group">
            <label>Giới thiệu sơ qua</label>
            <textarea  required class="form-control" rows="3" name="txtIntro">{{ old('txtIntro') }}</textarea>
            <!-- <script type="text/javascript">CKEDITOR.replace('txtIntro')</script> -->
        </div>
        <div class="form-group">
            <label>Mô tả sản phẩm</label>
            <textarea required class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label>Hình đại diện</label>
            <input type="file" required name="fImages">
        </div>
        <div class="form-group">
            <label>Từ khóa tìm kiếm</label>
            <input class="form-control" required name="txtKeyword" placeholder="Please Enter Category Keywords" value="{{ old('txtOrder') }}" />
        </div>
        <button type="submit" class="btn btn-default">Thêm</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>

    </div>
    <div class="col-lg-5">
        <div class="data _size">
            <span><b>Chọn size cho sản phẩm</b></span><br />
            @foreach($sizes AS $size)
            <label class="checkbox-inline">
              <input type="checkbox" name="size[]" value="{{ $size->id }}">{{ $size->name }}
            </label>
            @endforeach
        </div>
        <div class="data _image">
        @for($i = 1; $i <= 10; $i++)
            <div class="form-group">
                <label>Hình ảnh chi tiết {{ $i }}</label>
                <input type="file" name="fImagesDetail[]">
            </div>
        @endfor
        </div>
    </div>
</form>
@endsection
