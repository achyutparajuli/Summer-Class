@extends('admin.master')

@section('content')
<!-- Stats Section -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">👤 Users</h5>
                <p class="card-text fs-4">{{ $statistics['totalUsers'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">💰 Genres</h5>
                <p class="card-text fs-4">{{ $statistics['totalGenres'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">📦 Movies</h5>
                <p class="card-text fs-4">{{ $statistics['totalMovies'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">📉 Total Movie Watched</h5>
                <p class="card-text fs-4">{{ $statistics['totalMoviesWatched'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Other Content -->
<div class="card">
    <div class="card-header">Recent Movies</div>
    <div class="card-body">
        <ul>
            @foreach($movies as $movie)
            <li>{{ $movie->name }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection