<?php

namespace App\Service;

use App\Models\Actor;

class ActorService
{
    public function create(array $data): Actor
    {
        $actor = new Actor($data);
        $actor->save();

        return $actor;
    }

    public function edit(Actor $actor, array $data): void
    {
        $actor->fill($data);
        $actor->save();
    }

    public function delete(Actor $actor): void
    {
        $actor->delete();
    }
}
