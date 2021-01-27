@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
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
                        <h3 class="card-title">Edit Post - {{ $post->name }}</h3>
                        <div class="text-right">
                            <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary">Post List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="title">Post Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                               value="{{ $post->title }}" placeholder="Enter post title">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Post Category</label>
                                            
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="" style="display: none;">Select Category</option>
                                                @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" @if($post->category_id == $cat->id) selected @endif> {{ $cat->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-8">  
                                                    <label for="image">Post Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="image" class="custom-file-image">
                                                        <label for="image" class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div style="max-width: 100px; max-height:100px; overflow:hidden;margin-left: auto;">
                                                        <img src="{{ asset($post->image) }}" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tag">Choose Post Tag</label>
                                          <div class="d-flex flex-wrap">
                                            @foreach ($tags as $tag)
                                            <div class="custom-control custom-checkbox" style="margin-right: 20px;">
                                              <input id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" class="custom-control-input" type="checkbox" 
                                              @foreach ($post->tags as $t)
                                                  @if($tag->id == $t->id) checked @endif
                                              @endforeach
                                              >
                                              <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                                            </div>
                                            @endforeach
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter Description">{{ $post->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Post</button>
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

@section('style')
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
@endsection