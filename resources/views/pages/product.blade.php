@extends('layout.main')

@section('title', 'Product')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('danger')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('warning')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="/students/create" class="btn btn-primary">Create</a>
                    <div class="card mt-2">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/user-search" method="GET">
                                @csrf
                                <div class="input-group col-12 mt-2">
                                    <input type="text" name="search" class="form-control search-bar" id="search-bar"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button name="ok"
                                            class="btn btn-primary form-control btn-search">Search</button>
                                    </div>
                                </div>
                            </form>

                            <table id="" class="table table-bordered table-striped mt-2">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Count</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    @foreach ($models as $model)
                                        <tr>
                                            <td>{{ $model->id }}</td>
                                            <td>{{ $model->name }}</td>
                                            <td>{{ $model->category }}</td>
                                            <td>{{ $model->price }}</td>
                                            <td>{{ $model->count }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="/student-show/{{$model->id}}"
                                                        class="btn btn-primary mx-2">Show</a>


                                                    <a href="/student-update/{{$model->id}}"
                                                        class="btn btn-warning mx-2">Update</a>

                                                    <form action="/student/{{$model->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                    <div>
                        {{$models->links()}}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>


@endsection