<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendFavoriteMail;
use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MovieController extends Controller
{
    public function landingpage()
    {
        $movies = Movie::where('is_published', 1)->get();
        return view('user.homepage', compact('movies'));
    }

    public function addFavorite(Request $request)
    {
        $favorite = Favorite::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $request->movie_id,
        ]);
        $movie_name = Movie::select('title')->where('id', $request->movie_id)->first();
        if ($favorite) {
            $data = [
                'title' => $movie_name->title . ' ' . 'added to favorite',
                'body' => 'You can see your favorite movie list clicking my favorite movie tab',
                'url' => 'http://127.0.0.1:8000/my-favorite',
            ];

            Mail::to(Auth::user()->email)->send(new SendFavoriteMail($data));
            return back()->with('success', 'your movies added to favorite list');
        }
    }
    public function myFavorite()
    {
        $favorites = $favorites = Favorite::where('user_id', auth()->id())->get();;
        return view('user.my-favorite', compact('favorites'));
    }
}
