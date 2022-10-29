<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Movie\CreateRequest;
use App\Http\Requests\Api\Movie\EditRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Service\MovieService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function list(): AnonymousResourceCollection
    {
        $movies = Movie::query()->with(['user'])->latest()->paginate(6);

        return MovieResource::collection($movies);
    }

    public function create(CreateRequest $request): MovieResource
    {
        $data = $request->validated();
        $user = $request->user();
        $movie = $this->movieService->create($data, $user);

        return new MovieResource($movie);
    }

    public function edit(Movie $movie, EditRequest $request): MovieResource
    {
        $data = $request->validated();
        $this->movieService->edit($movie, $data);

        return new MovieResource($movie);
    }

    public function show(Movie $movie): MovieResource
    {
        return new MovieResource($movie);
    }

    public function delete(Movie $movie): Response
    {
        $this->movieService->delete($movie);
        $data = [
            'message' => 'movie deleted',
        ];

        return response($data, status: 200);
    }
}
