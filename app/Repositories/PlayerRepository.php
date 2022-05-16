<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Roster;
use App\Repositories\Interfaces\PlayerRepositoryInterface;

final class PlayerRepository implements PlayerRepositoryInterface
{
    public function findById(string $id): ?Roster
    {
        /** @var \App\Models\Roster|null $roster */
        $roster = (new Roster())->newQuery()
            ->where('id', '=', $id)
            ->first();

        return $roster;
    }
}
