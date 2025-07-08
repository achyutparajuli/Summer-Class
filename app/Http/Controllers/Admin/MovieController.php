<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Database\Seeders\GenreSeeder;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();

        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'));
    }

    public function delete($movieId)
    {
        Movie::where('id', $movieId)->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.movies.index');
    }
}
