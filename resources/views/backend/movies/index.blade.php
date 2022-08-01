@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Movies</li>
                    </ol>
                </div>
                <div class="col-md-6 justify-content-end">
                    <a href="{{ route('admin.movies.create') }}" class="btn  btn-info">New Movie</a>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Movies List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-hover responsive">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Release Date</th>
                                        <th>Publish</th>
                                        <th>Description</th>
                                        <th>Poster</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $key => $movie)
                                        <tr>
                                            <td>{{ ++$key }}</td>

                                            <td>{{ $movie->title }}</td>
                                            <td>{{ $movie->release_date }}</td>
                                            <td>
                                                {{ $movie->is_published ? 'Published' : 'Unpublished' }}
                                            </td>
                                            <td>{{ $movie->description }}</td>
                                            <td>
                                                <img class="position-absolute rounded" style="height: 35px; width: 35px;"
                                                    src="{{ asset($movie->poster) }}" style="object-fit: cover;">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.movies.edit', $movie->id) }}">
                                                    <button class="btn btn-outline-success btn-sm"><em
                                                            class="fa fa-edit"></em></button>
                                                </a>
                                                {{-- <a href="{{ route('admin.movies.delete', $movie->id) }}">
                                                    <button class="btn btn-outline-danger btn-sm"><em
                                                            class="fa fa-trash"></em></button>
                                                </a> --}}
                                                <form action="{{ route('admin.movies.delete', $movie->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit"
                                                        onclick="return confirm('Are you sure ?')"><em
                                                            class="fa fa-trash"></em></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
