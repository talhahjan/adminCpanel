@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Edit Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
@endsection

@section('content')
<!-- Main content -->
<section class="content  style=" padding:20px"">
    <div class="container-fluid">

        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif


        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif



        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>

            <!-- /.card-header -->

            <!-- form start -->
            <form action="{{route('admin.product.update', $product->id)}}" method="post" accept-charset="utf-8"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">


                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="txturl" class="form-control"
                                    value="{{$product->title}}" placeholder="Enter Title">
                                <p class="small">{{config('app.url')}}{{$product->slug}}<span id="url"></span></p>
                                <input type="hidden" name="slug" id="slug" value="{{$product->slug}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea name="description" id="description" class="textarea"
                                    placeholder="Describe category"
                                    style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                    {!!$product->description!!}
                      </textarea>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="price">Price</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="price" placeholder="00.00" value="{{$product->price}}"
                                            class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="price">Discount</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="discount" value="{{$product->discount}}"
                                            placeholder="00.00" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Thumbnails</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        @if($product->thumbnails()->count() > 0)
                                        @foreach($product->thumbnails as $thumbnail)
                                        <div class="col-md-2 border mx-1 border-dark rounded p-2">
                                            <img src="{{asset($thumbnail->path)}}" height="140" width="140"
                                                alt="{{$thumbnail->product_id}}" class="rounded">
                                            <div class="m-1">
                                                <a href="#" onclick="confirmDelete({{$thumbnail->id}})"><button
                                                        type="button"
                                                        class="btn btn-danger btn-sm float-left">Delete</button>
                                                    <form id="delete-thumbnail-{{$thumbnail->id}}"
                                                        action="{{ route('admin.thumbnail.destroy', $thumbnail->id) }}"
                                                        method="POST" style="display: none;">

                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-info btn-sm float-right">Info</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <strong>No thumbnail</strong>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <div class="card card-primary col-sm-12 p-0 mb-2">
                                <div class="card-header align-items-center">


                                    <span class="float-left" style="margin-right: 50px">
                                        <h3 class="card-title">Extra Options</h3>
                                    </span>
                                    <!-- /.card-tools -->

                                    <span class="float-right">
                                        <button type="button" id="btn-add" class="btn  btn-primary btn-sm"
                                            style="display:inline">+</button>
                                        <button type="button" id="btn-remove" class="btn btn-danger btn-sm"
                                            style="display:inline">-</button>
                                    </span>
                                </div>
                                <div class="card-body" id="extras">





                                </div>
                            </div>

                        </div>


                        <div class="col-md-4">

                            <br>
                            <div class="card card-primary">
                                <div class="card-header">
                                    Featured Image

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col imgUp">
                                                <div class="imagePreview"></div>
                                                <label class="btn btn-primary">
                                                    Upload<input type="file" class="uploadFile img" name="thumbnails[]"
                                                        value="Upload Photo"
                                                        style="width: 0px;height: 0px;overflow: hidden;">
                                                </label>
                                            </div><!-- col-2 -->
                                            <i class="fa fa-plus imgAdd"></i>
                                        </div><!-- row -->
                                    </div><!-- container -->


                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status" id="status" style="width:100%">
                                    <option value="0" {{$product->status==0 ? ' selected' : ''}}>pending</option>
                                    <option value="1" {{$product->status==1 ? ' selected' : ''}}>publish</option>

                                </select>

                            </div>


                            <div class="card card-primary">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                            {{$product->featured==1 ? ' checked' : ''}}>
                                        <label for="customCheckbox2" class="custom-control-label">Make featured
                                            Product</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                            <br>
                            <div class="card card-primary">
                                <div class="card-header">
                                    Select Category
                                </div>
                                <div class="card-body">
                                    <div class="form-group">

                                        <label>Multiple</label>
                                        <select class="select2" name="category_id[]" id="category_id"
                                            multiple="multiple" autocomplete="new-password"
                                            data-placeholder="Select category" style="width: 100%;">
                                            <option value="0">Top Level</option>
                                            @php
                                            $ids=Arr::pluck($product->categories, 'id');
                                            @endphp

                                            @if($categories)

                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{in_array($category->id, $ids) ? " selected" : ""}}>
                                                {{$category->title}}</option>

                                            @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" style="width: 90%">Add
                                    Product</button>
                            </div>

                        </div>
                        <!-- /.col (right) -->

                    </div>


                </div>




        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        </div>
        </form>
    </div>
    <!-- /.card -->


    </div><!-- /.container-fluid -->
</section>

@endsection


@section('Css')
<!-- selec2 --->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/admin_plugins/summernote/summernote-bs4.css')}}">
<style>
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color: #fff;
        background-size: cover;
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        display: block;
        border-radius: 0px;
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: -5px;
    }

    .imgUp {
        margin-bottom: 15px;
    }

    .del {
        position: absolute;
        top: 0px;
        right: 15px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        background-color: rgba(255, 255, 255, 0.6);
        cursor: pointer;
    }

    .imgAdd {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #4bd7ef;
        color: #fff;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 0px;
        cursor: pointer;
        font-size: 15px;
    }
</style>
@endsection


@section('JsScript')
<!-- Select2 -->
<script src="{{ asset('assets/admin_plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/admin_plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    function confirmDelete(id){
        let choice = confirm("Are You sure, You want to Delete this record ?")
        if(choice){
        document.getElementById('delete-thumbnail-'+id).submit();
        }
        }

    $(function () {
    // Summernote
    $('.textarea').summernote()
  })

  $(document).ready(function() {
    $('.select2').select2();
});
function slugify (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeiiiioooouuuunc------";

    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}

$('#txturl').on('keyup', function(){
		var url = slugify($(this).val());
		$('#url').html(url);
		$('#slug').val(url);
    });

    $(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input name="thumbnails[]" type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }

    });
});
$('#btn-add').on('click', function(e){
		var count = $('.options').length+1;

		$.get("{{route('admin.product.extras', 'id')}}").done(function(data){

			$('#extras').append(data);
		})
})
$('#btn-remove').on('click', function(e){
	$('.options:last').remove();
})
</script>
@endsection
