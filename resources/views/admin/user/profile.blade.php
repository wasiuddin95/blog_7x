@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
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
                        <h3 class="card-title">User Profile</h3>
                        <div class="text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">User List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('includes.errors')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">User Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                      value="{{ $user->name }}"  placeholder="Enter user name">
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">User Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="image" class="custom-file-image">
                                                        <label for="image" class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">User Description</label>
                                                    <textarea name="description" id="description" rows="2" class="form-control" placeholder="Enter Description">{{ $user->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                  <div class="card-body text-center">
                                    <div class="mb-4 m-auto" style="height: 200px; width: 200px; overflow:hidden;">
                                      <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle img-rounded" alt="Image not found">  
                                    </div>  
                                    <h5 class="mt-2">{{ $user->name }}</h5>
                                    <p>{{ $user->email }}</p>
                                  </div>  
                                </div>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
<script>
    $('#description').summernote({
      placeholder: 'Enter Your Profile Description',
      tabsize: 2,
      height: 100
    });
  </script>
@endsection