@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Category')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
@endsection

@section('content')
<!-- Main content -->
<section class="content  style=" padding:20px"">
    <div class="container-fluid">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                <h3 class="card-title">Edit Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.category.update', $category->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">




                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$category->title}}"
                            placeholder="Enter Title">
                        <p class="small">{{config('app.url')}}<span id="url">{{$category->slug}}</span></p>
                        <input type="hidden" name="slug" id="slug" value="{{$category->slug}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>

                        <textarea name="description" id="description" class="textarea" placeholder="Describe category"
                            style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                     {!!$category->description!!}
                    </textarea>
                    </div>


                    <div class="form-group">

                        <label>Multiple</label>
                        <select class="select2" name="parent_id[]" id="parent_id" multiple="multiple"
                            autocomplete="new-password" data-placeholder="Select category" style="width: 100%;">
                            <option value="0">Top Level</option>
                            @php
                            $ids=Arr::pluck($category->childrens, 'id');
                            @endphp

                            @if($categories)

                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{in_array($category->id, $ids) ? " selected" : ""}}>
                                {{$category->title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit Category</button>
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
@endsection


@section('JsScript')
<!-- Select2 -->
<script src="{{asset('assets/admin_plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin_plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
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

$('#title').on('keyup', function(){
		var url = slugify($(this).val());
		$('#url').html(url);
		$('#slug').val(url);
	})
</script>
@endsection
