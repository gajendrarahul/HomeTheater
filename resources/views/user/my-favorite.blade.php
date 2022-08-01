@extends('user.layouts.master')
@section('content')
    <div class="row">
        <div class="card mx-2 my-3 w-100">
            <center>
                <h2>Your Favorite movies</h2>
            </center>
        </div>
        @forelse ($favorites as $favorite)
            <div class="card mx-2 my-2" style="width: 18rem;">
                <img src="{{ $favorite->movie->poster }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $favorite->movie->title }}</h5>
                    <p class="card-text">{{ $favorite->movie->description }}</p>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="card mx-3 my-3">
                    <div class="card-heading">
                        <h2>You haven't added any favorite movie</h2>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
