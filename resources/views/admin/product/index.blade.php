@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Category')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Product</li>
@endsection

@section('content')
<div class="clearfix mx-5">
    <span class="float-left">
        <h2>Product List</h2>
    </span>
    <span class="float-right"><a href="{{route('admin.product.create')}}"><button class="btn btn-sm btn-primary">Add
                Product</button></a></span>
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
                            @if($products->count() > 0)
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}} </td>
                                <td>description</td>

                                <td>{{$product->slug}}</td>

                                <td> @if($product->categories()->count() > 0)
                                    @foreach($product->categories as $children)
                                    {{$children->title}},
                                    @endforeach
                                    @else
                                    <strong>{{"product"}}</strong>
                                    @endif</td>

                                <td>
                                    @if($product->thumbnails()->count() > 0)
                                    @foreach($product->thumbnails as $thumbnail)
                                    {{$thumbnail->product_id}},
                                    @endforeach
                                    @else
                                    <strong>No thumbnail</strong>
                                    @endif</td>

                                <td>

                                    <div class="btn-group btn-group-sm" style="max-height: 30px" role="group"
                                        aria-label="Basic example">
                                        <a href="{{route('admin.product.edit',$product->id)}}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit </a> |
                                        <a href=" #" onclick="confirmDelete({{$product->id}})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" style="display:inline"></i> Delete
                                            <form id="delete-product-{{$product->id}}"
                                                action="{{ route('admin.product.destroy', $product->id) }}"
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
            {{$products->Links()}}
        </div>
    </div>

</section>
<!-- /.content -->

@endsection

@section('Css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('assets/admin_plugins/toastr/toastr.min.css')}}">
@endsection


@section('JsScript')
<!--  Notifications Plugin    -->
<script src="/l7ecom/assets/js/plugins/bootstrap-notify.js"></script>

<!-- DataTables -->
<script src="{{asset('assets/admin_plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin_plugins//datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">
    function confirmDelete(id){
        let choice = confirm("Are You sure, You want to Delete this record ?")
        if(choice){
        document.getElementById('delete-product-'+id).submit();
        }
        }

</script>
