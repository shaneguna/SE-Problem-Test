<?php

declare(strict_types=1);

namespace App\Services\Exporter\Drivers;

use App\Http\Resources\ExporterCollectionResource;
use App\Repositories\Interfaces\PlayerTotalRepositoryInterface;
use App\Services\Exporter\Enums\ExporterDriverTypesEnum;
use App\Services\Exporter\Interfaces\ExporterDriverInterface;
use App\Services\Roster\Resources\RosterCriteriaResource;

final class PlayerStatsExporterDriver implements ExporterDriverInterface
{
    private PlayerTotalRepositoryInterface $playerTotalRepository;

    public function __construct(PlayerTotalRepositoryInterface $playerTotalRepository) {
        $this->playerTotalRepository = $playerTotalRepository;
    }

    public function export(RosterCriteriaResource $criteriaResource): ExporterCollectionResource {
        $query = $this->playerTotalRepository->findByCriteria($criteriaResource);

        return new ExporterCollectionResource($query);
    }

    public function supports(string $type): bool
    {
        return $type === ExporterDriverTypesEnum::PLAYER_STATS->value;
    }
}