@extends('admin.master')
@section('pageHeader', 'Product')
@section('function', 'edit')
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
<form action="{{ route('admin.products.postEdit', $product->id) }}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
                <option value="">Please Choose Category</option>
                @if($cate)
                <?php cate_parent($cate, 0, "", old('category')); ?>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter name" value="{{ old('txtName', isset($product->name) ? $product->name : null) }}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter price" value="{{ old('txtPrice', isset($product->price) ? $product->price : null) }}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($product->intro) ? $product->intro : null) }}</textarea>
            <script type="text/javascript">CKEDITOR.replace('txtIntro')</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{{ old('txtContent', isset($product->content) ? $product->content : null) }}</textarea>
            <script type="text/javascript">CKEDITOR.replace('txtContent')</script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{{ old('txtOrder', isset($product->keywords) ? $product->keywords : null) }}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="description">{{ old('description', isset($product->description) ? $product->description : null) }}</textarea>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>

    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        @for($i = 1; $i <= 10; $i++)
        <div class="form-group">
            <label>Images {{ $i }}</label>
            <input type="file" name="fImagesDetail[]">
        </div>
        @endfor
    </div>
</form>
@endsection
