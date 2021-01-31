@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Main Content --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Edit User</h3>
                        <div class="text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">User List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('user.update', [$user->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                               value="{{ $user->name }}" placeholder="Enter user name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">User email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                            value="{{ $user->email }}" placeholder="Enter user email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">User password <small style="color: red;">(Enter password if you want to change)</small></label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter user password">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection