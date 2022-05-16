<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Roster;

interface PlayerRepositoryInterface
{
    public function findById(string $id): ?Roster;
}