<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\CreateRequest;
use App\Http\Requests\Movie\EditRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function list(Request $request)
    {
        $movies = Movie::query()->paginate(5);

        return view('movies.list', ['movies' => $movies]);
    }

    public function createForm()
    {
        $genres = Genre::all();
        $actors = Actor::all();

        return view('movies.create', compact('genres', 'actors'));
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $movie = new Movie($data);
        $movie->user()->associate(Auth::user());
        $movie->save();

        $movie->genres()->attach($data['genres']);
        $movie->actors()->attach($data['actors']);

        session()->flash('success', 'Success!');

        return redirect()->route('movies.show', ['movie' => $movie->id]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function editForm(Movie $movie)
    {
        $genres = Genre::all();
        $actors = Actor::all();

        return view('movies.edit', compact('movie', 'genres', 'actors'));
    }

    public function edit(Movie $movie, EditRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        $movie->fill($data);
        $movie->save();

        $movie->genres()->sync($data['genres']);
        $movie->actors()->sync($data['actors']);

        session()->flash('success', 'Success!');

        return redirect()->route('movies.show', ['movie' => $movie->id]);
    }

    public function delete(Movie $movie)
    {
        $movie->delete();
        session()->flash('success', 'Success deleted!');

        return redirect()->route('movies');
    }
}
