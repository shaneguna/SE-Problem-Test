<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\PlayerTotal;
use App\Services\Roster\Resources\RosterCriteriaResource;
use Illuminate\Support\Collection;

interface PlayerTotalRepositoryInterface
{
    /**
     * @return null|\Illuminate\Support\Collection<\App\Models\PlayerTotal>
     */
    public function findByCriteria(RosterCriteriaResource $criteria): ?Collection;
}