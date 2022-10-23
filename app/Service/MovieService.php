<?php

namespace App\Service;

use App\Models\Movie;
use App\Models\User;

class MovieService
{
    public function create(array $data, User $user): Movie
    {
        $movie = new Movie($data);
        $movie->user()->associate($user);
        $movie->save();

        $movie->genres()->attach($data['genres']);
        $movie->actors()->attach($data['actors']);

        return $movie;
    }

    public function edit(Movie $movie, array $data): void
    {
        $movie->fill($data);

        $movie->genres()->sync($data['genres']);
        $movie->actors()->sync($data['actors']);

        $movie->save();
    }

    public function delete(Movie $movie): void
    {
        $movie->delete();
    }
}
