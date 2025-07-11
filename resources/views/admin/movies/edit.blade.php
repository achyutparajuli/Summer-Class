@extends('admin.master')

@section('content')

<div class="container my-5">

    <div class="container mt-4">
        <h4>Edit Movie</h4>

        <form action="{{ route('admin.movies.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Movie Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') ?? $movie->name }}" name="name" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select class="form-select" id="genre_id" name="genre_id" required>
                    <option value="">Select Genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @if((old('genre_id') ?? $movie->genre_id) ==$genre->id) selected @endif>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') ?? $movie->description }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number" class="form-control" id="duration" value="{{ old('duration') ?? $movie->duration }}" name="duration" required>
                @error('duration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release_date" value="{{ old('release_date') ?? $movie->release_date }}" name="release_date" required>
                @error('release_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" step="1" class="form-control" value="{{ old('rating') ?? $movie->rating }}" id="rating" name="rating" required>
                @error('rating')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Image <a target="_blank" href="{{ asset($movie->image) }}">Existing Image</a></label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <input type="text" class="form-control" id="language" value="{{ old('language') ?? ($movie->language ?? 'english') }}" name="language" required>

                @error('language')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Movie</button>
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>


</div>

@endsection