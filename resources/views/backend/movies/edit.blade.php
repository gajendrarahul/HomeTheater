@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Movie</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('admin.movies.index') }}">Movies</a></li>
                        <li class="breadcrumb-item active">Update Movie</li>
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
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('admin.movies.update', $movie->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $movie->title }}"
                                        id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="release_date"> Release Date</label>
                                    <input type="date" name="release_date" class="form-control" id="release_date"
                                        autocomplete="off" placeholder="Release Date" value="{{ $movie->release_date }}">
                                    @if ($errors->has('release_date'))
                                        <p style="color: gold">
                                            {{ $errors->first('release_date') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Publish</label>
                                    <div>
                                        <select class="form-control" aria-label="Default select example"
                                            name="is_published">
                                            <option value="1" {{ $movie->is_published == '1' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="0" {{ $movie->is_published == '0' ? 'selected' : '' }}>
                                                Unpublish</option>

                                        </select>
                                        @if ($errors->has('is_published'))
                                            <p style="color: gold">
                                                {{ $errors->first('is_published') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="poster">Poster:</label>

                                    <input type="file" name="poster" id="poster"
                                        class="form-control @error('poster') is-invalid @enderror">
                                    @if ($errors->has('poster'))
                                        <p style="color: red">
                                            {{ $errors->first('poster') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="20" rows="6" class="form-control">
                                        {{ $movie->description }}
                                    </textarea>
                                </div>

                            </div>

                            <div class="card-footer float-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.movies.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
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
