@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Setting</li>
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
                        <h3 class="card-title">Edit Site Setting</h3>
                        {{-- <div class="text-right">
                            <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary">Post List</a>
                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="name">Site Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                               value="{{ $setting->name }}" placeholder="Enter Site Name">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" name="facebook" class="form-control" id="facebook"
                                                       value="{{ $setting->facebook }}" placeholder="facebook url">
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" name="twitter" class="form-control" id="twitter"
                                                       value="{{ $setting->twitter }}" placeholder="twitter url">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" name="instagram" class="form-control" id="instagram"
                                                       value="{{ $setting->instagram }}" placeholder="instagram url">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="reddit">Reddit</label>
                                                    <input type="text" name="reddit" class="form-control" id="reddit"
                                                       value="{{ $setting->reddit }}" placeholder="reddit url">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email"
                                                       value="{{ $setting->email }}" placeholder="email url">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="copyright">Copyright</label>
                                                    <input type="text" name="copyright" class="form-control" id="copyright"
                                                       value="{{ $setting->copyright }}" placeholder="copyright">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone">Contact Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="phone"
                                                       value="{{ $setting->phone }}" placeholder="enter phone number">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="address">Contact Location</label>
                                                    <textarea name="address" id="address" class="form-control" rows="1" placeholder="Enter Contact Address">{{ $setting->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-8">  
                                                    <label for="site_logo">Site Logo</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="site_logo" id="site_logo" class="custom-file-image">
                                                        <label for="site_logo" class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div style="max-width: 100px; max-height:100px; overflow:hidden;margin-left: auto;">
                                                        <img src="{{ asset($setting->site_logo) }}" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Site Description</label>
                                            <textarea name="description" id="description" rows="3" class="form-control"
                                                placeholder="Enter Description">{{ $setting->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Setting</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
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

{{-- @section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
<script>
    $('#description').summernote({
      placeholder: 'Enter Post Description',
      tabsize: 2,
      height: 300
    });
  </script>
@endsection --}}