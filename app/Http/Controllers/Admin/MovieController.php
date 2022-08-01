<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieFormRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\File;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('backend.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieFormRequest $request)
    {
        $validated_data = $request->validated();
        if (!$validated_data) {
            return back()->with('error', 'something went wrong');
        }
        $validated_data['poster'] = $this->uploadImage();
        Movie::create($validated_data);
        return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('backend.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieFormRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $validated_data = $request->validated();
        if (!$validated_data) {
            return back()->with('error', 'something went wrong');
        }
        if ($movie) {
            if ($request->hasFile('poster')) {
                $imagePath = public_path($movie->poster);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                    // unlink($imagePath);
                }
                $validated_data['poster'] =  $this->uploadImage();
            } else {
                $validated_data['poster'] = $movie->poster ?? $this->uploadImage();
            }
        }
        // $validated_data['poster'] = $this->uploadImage();
        $movie->update($validated_data);
        return redirect()->route('admin.movies.index')->with('success', 'Movie Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return back()->with('success', 'Movie deleted successfully');
    }

    public function uploadImage()
    {
        if (Request::file('poster')) {
            $file = Request::file('poster');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = 'uploads/posters/';
            $safeName        = uniqid() . '.' . $extension;
            $file->move($folderName, $safeName);

            $filePath = $folderName . $safeName;
            $filename = $filePath;

            return $filename;
        } else {
            return '';
        }
    }
}
