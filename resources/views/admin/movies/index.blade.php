@extends('admin.master')

@push('css')
<style>
    img {
        width: auto;
        height: 5rem;
    }
</style>
@endpush

@section('content')

<div class="container my-5">
    <h2 class="mb-4">Movies Information</h2>

    <div class="mb-3">
        <form action="{{ route('admin.movies.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Movie here" value="{{ request()->search }}">

                <select name="genre_id">
                    <option value="">Select Genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @if($genre->id == request()->genre_id) selected @endif>{{ $genre->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="mb-2 text-end">
        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">Create</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Image</th>
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
                <td><a href="{{ asset($movie->image) }}" target="_blank"><img src="{{ asset($movie->image) }}"></a></td>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->genre->name }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->duration }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->rating }}</td>
                <td>
                    <a href="{{ route('admin.movies.edit',$movie->id) }}" class="text-primary me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.movies.delete', $movie->id) }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Are you sure you want to delete this movie?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection