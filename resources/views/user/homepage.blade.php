@extends('user.layouts.master')
@section('content')
    <div class="row mx-3">
        @forelse ($movies as $movie)
            <div class="card mx-2 my-2" style="width: 18rem;">
                <img src="{{ $movie->poster }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ $movie->description }}</p>
                    <p class="card-text"><span><em class="fa fa-thumbs-up"></em> </span>{{ $movie->favoriteCount->count() }}
                    </p>
                    @if (Auth::check() && !$movie->isFavorited)
                        <form action="{{ route('add-favorite', ['movie_id' => $movie->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">Favorite</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="row">
                <div class="card">
                    <div class="card-heading">
                        <h2>No movies Published yet</h2>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
