@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <strong>Total User: </strong>
                    <strong>{{ App\Models\User::count() }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <strong>Total Movies: </strong>
                    <strong>{{ App\Models\Movie::count() }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
