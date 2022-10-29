<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\CreateRequest;
use App\Http\Requests\Actor\EditRequest;
use App\Models\Actor;
use App\Service\ActorService;

class ActorController extends Controller
{
    public function __construct(private ActorService $actorService)
    {
    }

    public function list()
    {
        $actors = Actor::query()->paginate(10);

        return view('actors.list', ['actors' => $actors]);
    }

    public function createForm()
    {
        return view('actors.create');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $actor = $this->actorService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('actors.show', ['actor' => $actor->id]);
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function editForm(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function edit(Actor $actor, EditRequest $request)
    {
        $data = $request->validated();

        $this->actorService->edit($actor, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('actors.show', ['actor' => $actor->id]);
    }

    public function delete(Actor $actor)
    {
        $this->actorService->delete($actor);
        session()->flash('success', 'Success deleted!');

        return redirect()->route('actors');
    }
}
