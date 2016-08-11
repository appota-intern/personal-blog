@extends('admin.master')
@section('titlepage','Post')
@section('namepage','Add')
@section('content')
<!-- /.col-lg-12 -->
<form action="{!!  url('/admin/post/add')  !!}" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
@include('admin.blocks.error')
     <input  type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="cateParent">
                <option value="">Please Choose Category</option>
                    <?php cate_parent ($cate, 0, "--", old('cateParent')) ?>
            
            </select>
        </div>
        <div class="form-group">
            <label>Place</label>
            <select class="form-control" name="placeParent">
                <option value="">Please Choose Place</option>
                <?php place_parent ($place, 0, "--", old('placeParent')) ?>
            
            </select>
        </div>
        <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!!  old('txtName') !!}" />
        </div>
        <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="8" name="txtContent">{!!  old('txtContent') !!}</textarea>
                    <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages" value="{!!  old('fImages') !!}" >
        </div>
        <div class="form-group">
                    <label>Post Keywords</label>
                    <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!!  old('txtKeywords') !!}"  />
        </div>
        <div class="form-group">
                    <label>Post Description</label>
                    <textarea class="form-control" rows="3" name= "txtDescription" >{!!  old('txtDescription') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Post Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>
<!-- <div class="col-md-1"></div>
<div class="col-md-4">
        @for($i =1; $i<=10; $i++)
        <div class="'form-group">
                <label>Image Post Detail  {!! $i !!}</label>
                <input type="file" name="fpostDetail[]">
        </div>
        @endfor
</div> -->
</form>
@endsection