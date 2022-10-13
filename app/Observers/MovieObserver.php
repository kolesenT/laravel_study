<?php

namespace App\Observers;

use App\Mail\EditMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MovieObserver
{
    /**
     * Handle the Movie "updated" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function updated(Movie $movie)
    {
        if ($movie->year !== $movie->getOriginal('year')) {
            $users = User::all();
            foreach ($users as $user) {
                if ($movie->user_id !== $user->id) {
                    Mail::to($user->email)->send(new EditMovie($movie));
                }
            }
        }
    }
}
