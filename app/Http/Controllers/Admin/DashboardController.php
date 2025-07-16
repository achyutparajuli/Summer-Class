<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'totalUsers' => User::count(),
            'totalGenres' => Genre::count(),
            'totalMovies' => Movie::count(),
            'totalMoviesWatched' => 4,
        ];

        $movies = Movie::latest()->take(5)->get(['id', 'name']); // select * from movies order by id desc

        return view('admin.dashboard.index', compact('statistics', 'movies'));
    }
}
