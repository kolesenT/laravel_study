<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use App\Service\GenreService;

class GenreController extends Controller
{
    public function __construct(private GenreService $genreService)
    {
    }

    public function list()
    {
        $genres = Genre::query()->paginate(10);

        return view('genres.list', ['genres' => $genres]);
    }

    public function createForm()
    {
        return view('genres.create');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $genre = $this->genreService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('genres.show', ['genre' => $genre->id]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    public function editForm(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        $data = $request->validated();

        $genre = $this->genreService->edit($genre, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('genres.show', ['genre' => $genre->id]);
    }

    public function delete(Genre $genre)
    {
        $this->genreService->delete($genre);
        session()->flash('success', 'Success deleted!');

        return redirect()->route('genres');
    }
}
