<?php

namespace App\Models;

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
}
