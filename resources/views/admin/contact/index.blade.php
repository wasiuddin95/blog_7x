@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Contact Message List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Message List</li>
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
                        <h3 class="card-title">Contact Message List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th style="width:25%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($messages->count())
                                @foreach ($messages as $message)
                                    
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('contact.show', ['id' => $message->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> Show</a>
                                        
                                        <form action="{{ route('contact.destroy', [$message->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                                @else
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No Messages Found!</h5>
                                        </td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                        {{ $messages->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection