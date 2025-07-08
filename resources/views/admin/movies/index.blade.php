@extends('admin.master')

@section('content')

<div class="container my-5">
    <h2 class="mb-4">Movies Information</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->genre_id }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->duration }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->rating }}</td>
                <td>
                    <a href="#" class="text-primary me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="#" class="text-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection