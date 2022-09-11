<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\EditRequest;
use App\Http\Requests\Movie\CreateRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function list(Request $request)
    {
        $movies = Movie::query()->paginate(5);

        return view('movies.list', ['movies' => $movies]);
    }

    public function createForm()
    {
        return view('movies.create');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $movie = new Movie($data);
        $movie->save();

        session()->flash('success', 'Success!');
        return redirect()->route('movies.show', ['movie' => $movie->id]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function editForm(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function edit(Movie $movie, EditRequest $request)
    {
        $data = $request->validated();

        $movie->fill($data);
        $movie->save();

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
