@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                    <div class="card">

                        <div class="px-5">
                            <form action="{{ route('admin.users.index') }}" class='d-flex align-items-center'
                                style="margin-left: 20px;" method="GET">
                                <div class="row">
                                    <div class="form-group mb-3 px-2 mb-md-0 d-flex align-items-center col-md-5">
                                        <label for="date" class="mb-0 px-0 pr-2">From Date</label>
                                        <input type="date" value="{{ $from_date }}" name="from_date"
                                            class="form-control" id="date" placeholder="Date">
                                    </div>
                                    <div class="form-group mb-3 px-2 mb-md-0 d-flex align-items-center col-md-5">
                                        <label for="date" class="mb-0 px-0 pr-2">To Date</label>
                                        <input type="date" value="{{ $to_date }}" name="to_date"
                                            class="form-control" id="date" placeholder="Date">
                                    </div>
                                    <button type="submit" class="btn btn-primary"></i>
                                        Search</button>
                                </div>
                        </div>
                        </form>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Show Favorite</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#favoriteModal{{ $user->id }}"><em
                                                        class="fa fa-eye"></em>
                                                </button></td>
                                        </tr>
                                        @include('modals.favorite')
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
