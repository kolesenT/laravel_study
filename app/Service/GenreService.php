<?php

namespace App\Service;

use App\Models\Genre;

class GenreService
{
    public function create(array $data): Genre
    {
        $genre = new Genre($data);
        $genre->save();

        return $genre;
    }

    public function edit(Genre $genre, array $data): void
    {
        $genre->fill($data);
        $genre->save();
    }

    public function delete(Genre $genre): void
    {
        $genre->delete();
    }
}
