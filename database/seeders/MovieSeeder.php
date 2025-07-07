<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'name' => 'Fast & Furious',
            'description' => 'An action-packed car racing thriller.',
            'duration' => 130.0,
            'release_date' => '2009-06-04',
            'rating' => 8.2,
            'genre_id' => 1,
            'language' => 'English',
            'cast' => 'Vin Diesel, Paul Walker',
        ]);

        Movie::create([
            'name' => 'The Hangover',
            'description' => 'A comedy about a bachelor party gone wrong.',
            'duration' => 100.0,
            'release_date' => '2009-06-05',
            'rating' => 7.7,
            'genre_id' => 2,
            'language' => 'English',
            'cast' => 'Bradley Cooper, Ed Helms, Zach Galifianakis',
        ]);

        Movie::create([
            'name' => 'Mad Max: Fury Road',
            'description' => 'A high-octane action film set in a post-apocalyptic world.',
            'duration' => 120.0,
            'release_date' => '2015-05-15',
            'rating' => 8.1,
            'genre_id' => 1,
            'language' => 'English',
            'cast' => 'Tom Hardy, Charlize Theron',
        ]);
    }
}
