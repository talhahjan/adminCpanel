@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: user')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">users</li>
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




        <div class="clearfix mx-5">
            <span class="float-left">
                <h2>Users List</h2>
            </span>
            <span class="float-right"><a href="{{route('admin.users.create')}}"><button class="btn btn-sm btn-primary">Add
                        User</button></a></span>
        </div>




        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><input type="checkbox" id="select-all" name="ids"></th>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td><input type="checkbox" id="{{$user->id}}" name=""delete></td>

                            <td> <span class="user-profile">
                                    <img src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('uploads/users/avatars/default-avatar.png') }}" class="img-circle elevation-2" style="height: 30px; width:30px; margin-right: 10px" alt="User Image">
                                </span> {{$user->profile->first_name .' '.$user->profile->last_name}}
                            </td>
                            <td> {{$user->email}}</td>
                            <td>{{$user->role->name}}</td>

                            <td>{!!$user->profile->status==1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Disabled</span>'!!}</td>
                            <td>
                                <div class="btn-group btn-group-sm" style="max-height: 25px" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i> Edit </a> |
                                    <a href=" #" onclick="confirmDelete('{{$user->id}}')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash" style="display:inline"></i> Delete
                                        <form id="delete-user-{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form> </a>
                                </div>
                            </td>


                        </tr>


                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <p class="text-center">No records in database</p>
                            </td>
                        </tr>
                        @endif

                    </tbody>

                </table>
            </div>

            <!-- /.card-body -->
            <div class="card-footer pull-right">
            {{$users->Links()}}
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
        
        </div>
    </div>

</section>
<!-- /.content -->

@endsection






























@section('Css')
@endsection


@section('JsScript')

<script type="text/javascript">
    function confirmDelete(id) {
        let choice = confirm("Are You sure, You want to Delete this record ?")
        if (choice) {
            document.getElementById('delete-user-' + id).submit();
        }
    }
</script>
@endsection