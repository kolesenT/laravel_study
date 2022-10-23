<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\CreateRequest;
use App\Http\Requests\Movie\EditRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Service\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function list(Request $request)
    {
        $movies = Movie::query()->with(['user'])->paginate(6);

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

        $user = $request->user();

        $movie = $this->movieService->create($data, $user);

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

        $this->movieService->edit($movie, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('movies.show', ['movie' => $movie->id]);
    }

    public function delete(Movie $movie)
    {
        $this->movieService->delete($movie);
        session()->flash('success', 'Success deleted!');

        return redirect()->route('movies');
    }
}
