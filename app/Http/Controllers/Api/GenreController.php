<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Genre\CreateRequest;
use App\Http\Requests\Api\Genre\EditRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Service\GenreService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    public function __construct(private GenreService $genreService)
    {
    }

    public function list(): AnonymousResourceCollection
    {
        $genres = Genre::query()->latest()->paginate(6);

        return GenreResource::collection($genres);
    }

    public function show(Genre $genre): GenreResource
    {
        return new GenreResource($genre);
    }

    public function create(CreateRequest $request): GenreResource
    {
        $data = $request->validated();
        $genre = $this->genreService->create($data);

        return new GenreResource($genre);
    }

    public function edit(Genre $genre, EditRequest $request): GenreResource
    {
        $data = $request->validated();
        $this->genreService->edit($genre, $data);

        return new GenreResource($genre);
    }

    public function delete(Genre $genre): Response
    {
        $this->genreService->delete($genre);
        $data = [
            'message' => 'genre deleted',
        ];

        return response($data, status: 200);
    }
}
