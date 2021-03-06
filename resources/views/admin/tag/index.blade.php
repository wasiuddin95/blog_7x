@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tag List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tag List</li>
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
                        <h3 class="card-title">Tag List</h3>
                        <div class="text-right">
                            <a href="{{ route('tag.create') }}" class="btn btn-sm btn-primary">+Add Tag</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th style="width:25%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($tags->count())
                                @foreach ($tags as $tag)

                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('tag.edit', [$tag->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> Edit</a>
                                    
                                        <form action="{{ route('tag.destroy', [$tag->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button id="delete" type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach 

                                @else
                                    <tr>
                                        <td colspan="4">
                                            <h5 class="text-center">No Tags Found!</h5>
                                        </td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  

@endsection