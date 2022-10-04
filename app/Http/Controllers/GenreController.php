<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;

class GenreController extends Controller
{
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

        $genre = new Genre($data);
        $genre->save();

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

        $genre->fill($data);
        $genre->save();

        session()->flash('success', 'Success!');

        return redirect()->route('genres.show', ['genre' => $genre->id]);
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        session()->flash('success', 'Success deleted!');

        return redirect()->route('genres');
    }
}
