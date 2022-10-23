<?php

namespace App\Observers;

use App\Jobs\EditMovieEmail;
use App\Models\Movie;

class MovieObserver
{
    public function created()
    {
        //
    }

    /**
     * Handle the Movie "updated" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function updated(Movie $movie)
    {
        if ($movie->year !== $movie->getOriginal('year')) {
            EditMovieEmail::dispatch($movie);
        }
    }
}
