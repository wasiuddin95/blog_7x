@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">User List</li>
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
                        <h3 class="card-title">User List</h3>
                        <div class="text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">+Add User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width:25%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->count())
                                @foreach ($users as $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px; overflow:hidden">
                                            <img src="{{ asset($user->image) }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('user.edit', [$user->id]) }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> Edit</a>
                                        {{-- <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-sm
                                        btn-success mr-1"> <i class="fas fa-eye"></i> View</a> --}}
                                        <form action="{{ route('user.destroy', [$user->id]) }}" class="mr-1"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No User Found!</h5>
                                    </td>
                                </tr>

                                @endif
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection