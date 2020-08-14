@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Category')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Categories</li>
@endsection

@section('content')
<div class="clearfix mx-5">
    <span class="float-left">
        <h2>Category</h2>
    </span>
    <span class="float-right"><a href="{{route('admin.category.create')}}"><button class="btn btn-sm btn-primary">Add
                category</button></a></span>
</div>

<!-- Main content -->
<section class="content">

    @if (session()->has('message'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{session('message')}}
        </div>

    </div>
    @endif


    @if (session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>

    </div>
    @endif





    <div class="row">
        <div class="col-12">


            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>slug</th>
                                <th>Categories</th>
                                <th>date Created</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($categories->count() > 0)
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category['id']}}</td>
                                <td>{{$category['title']}} </td>
                                <td>{{!! $category['description'] !!}}</td>
                                <td>{{$category['slug']}}</td>

                                <td>
                                    @if($category->childrens()->count() > 0)
                                    @foreach($category->childrens as $children)
                                    {{$children->title}},
                                    @endforeach
                                    @else
                                    <strong> {{"parent Category"}}</strong>
                                    @endif
                                </td>
                                <td>{{$category['created_at']}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" style="max-height: 25px" role="group"
                                        aria-label="Basic example">
                                        <a href="{{route('admin.category.edit',$category->id)}}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit </a> |
                                        <a href=" #" onclick="confirmDelete({{$category->id}})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" style="display:inline"></i> Delete
                                            <form id="delete-category-{{$category->id}}"
                                                action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="POST" style="display: none;">

                                                @method('DELETE')
                                                @csrf
                                            </form> </a>
                                    </div>
                                </td>


                            </tr>


                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">
                                    <p class="text-center">No records in database</p>
                                </td>
                            </tr>
                            @endif

                        </tbody>

                    </table>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            {{$categories->Links()}}
        </div>
    </div>

</section>
<!-- /.content -->

@endsection


@section('Css')
@endsection


@section('JsScript')

<script type="text/javascript">
    function confirmDelete(id){
        let choice = confirm("Are You sure, You want to Delete this record ?")
        if(choice){
        document.getElementById('delete-category-'+id).submit();
        }
        }

</script>
@endsection
