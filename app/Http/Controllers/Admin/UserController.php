<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $users = User::where('user_type', 'user')->select('id', 'name', 'email')->with('favorites', function ($query) use ($from_date, $to_date) {
            $query->when($from_date, function ($query) use ($from_date, $to_date) {
                $query->whereHas('movie', function ($query) use ($from_date, $to_date) {
                    $query->whereBetween('release_date', [$from_date, $to_date]);
                });
            });
        })->get();
        return view('backend.user.index', compact('users', 'from_date', 'to_date'));
    }
}
