<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Database\Seeders\GenreSeeder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name', 'ASC')->get();
        $movies = Movie::filterSearch()->filterGenreId()->latest()->get();

        return view('admin.movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'release_date' => 'date',
            'language' => 'max:15',
            'genre_id' => 'required|exists:genres,id',
        ]);

        if ($validator->fails()) {
            toastr()->warning('Please check your form and try again.');
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator->errors());
        }

        $data = $request->all();
        if ($request->image) {
            $imagePath = $request->file('image')->store('images', 'public');
            unset($data['image']);
            $data['image'] = 'storage/' . $imagePath;
        }

        $newMovie = new Movie();
        $newMovie->name = $request->name;
        $newMovie->save();

        toastr()->success('Data has been created successfully!');
        return redirect()->route('admin.movies.index');
    }

    public function edit($movieId)
    {
        $movie = Movie::where('id', $movieId)->first();
        if (!$movie) {
            toastr()->error('No Such movie found!');
            return redirect()->route('admin.movies.index');
        }
        $genres = Genre::all();

        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function delete($movieId)
    {
        Movie::where('id', $movieId)->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.movies.index');
    }

    public function update($movieId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'release_date' => 'date',
            'language' => 'max:15',
            'genre_id' => 'required|exists:genres,id',
        ]);

        if ($validator->fails()) {
            toastr()->warning('Please check your form and try again.');
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator->errors());
        }
        $movie = Movie::where('id', $movieId)->first();

        if (!$movie) {
            toastr()->error('No Such movie found!');
            return redirect()->route('admin.movies.index');
        }

        $data = $request->all();
        if ($request->image) {
            $imagePath = $request->file('image')->store('images', 'public');
            unset($data['image']);
            $data['image'] = 'storage/' . $imagePath;
        }
        $movie->update($data);

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('admin.movies.index');
    }
}
