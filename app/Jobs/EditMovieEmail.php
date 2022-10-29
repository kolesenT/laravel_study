<?php

namespace App\Jobs;

use App\Mail\EditMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EditMovieEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    //число попыток
    public $tries = 5;

    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Movie $movie): void
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($movie->user_id !== $user->id) {
                Mail::to($user->email)->send(new EditMovie($movie));
            }
        }
    }
}
