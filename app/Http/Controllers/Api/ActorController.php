<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Actor\CreateRequest;
use App\Http\Requests\Api\Actor\EditRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use App\Service\ActorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ActorController extends Controller
{
    public function __construct(private ActorService $actorService)
    {
    }

    public function list(): AnonymousResourceCollection
    {
        $actors = Actor::query()->latest()->paginate(6);

        return ActorResource::collection($actors);
    }

    public function show(Actor $actor): ActorResource
    {
        return new ActorResource($actor);
    }

    public function create(CreateRequest $request): ActorResource
    {
        $data = $request->validated();

        $actor = $this->actorService->create($data);

        return new ActorResource($actor);
    }

    public function edit(Actor $actor, EditRequest $request): ActorResource
    {
        $data = $request->validated();
        $this->actorService->edit($actor, $data);

        return new ActorResource($actor);
    }

    public function delete(Actor $actor): Response
    {
        $this->actorService->delete($actor);
        $data = [
            'message' => 'actor deleted',
        ];

        return response($data, status: 204);
    }
}
