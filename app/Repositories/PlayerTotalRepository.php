<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\PlayerTotal;
use App\Repositories\Interfaces\PlayerTotalRepositoryInterface;
use App\Services\Roster\Resources\RosterCriteriaResource;
use Illuminate\Support\Collection;

final class PlayerTotalRepository implements PlayerTotalRepositoryInterface
{
    /**
     * @return null|\Illuminate\Support\Collection<\App\Models\PlayerTotal>
     */
    public function findByCriteria(RosterCriteriaResource $criteria): ?Collection
    {
        $playerTotal = (new PlayerTotal())->newQuery()
            ->join('roster', 'roster.id', 'player_totals.player_id')
            ->where($criteria->jsonSerialize());

        if ($criteria->getPlayerId() === null) {
            return $playerTotal->get();
        }

        return \collect($playerTotal->first());
    }
}
