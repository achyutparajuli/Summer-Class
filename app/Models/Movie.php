<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'genre_id',
        'duration',
        'description',
        'language',
        'release_date',
        'rating',
        'image'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeFilterSearch($query)
    {
        if ($search = request('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('genre', function ($qa) use ($search) {
                    $qa->where('name', 'like', '%' . $search . '%');
                });
        }
        return $query;
    }

    public function scopeFilterGenreId($query)
    {
        if ($genreId = request('genre_id')) {
            $query->where('genre_id', $genreId);
        }
        return $query;
    }
}
