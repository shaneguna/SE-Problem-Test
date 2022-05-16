<?php

declare(strict_types=1);

namespace App\Services\PlayerStats\Mappers;

use App\Models\Interfaces\PlayerInterface;
use App\Services\PlayerStats\Interfaces\PlayerStatsDetailsMapperInterface;
use App\Services\PlayerStats\Resources\PlayerStatsResource;

final class PlayerStatsDetailsMapper implements PlayerStatsDetailsMapperInterface
{
    public function map(PlayerInterface $data): PlayerStatsResource
    {
        $fieldGoalPct = $this->getStatPercentage(
            $data->getAttribute('field_goals_attempted'),
            $data->getAttribute('field_goals')
        );

        $twoPointPct = $this->getStatPercentage(
            $data->getAttribute('2pt_attempted'),
            $data->getAttribute('2pt')
        );

        $threePointPct = $this->getStatPercentage(
            $data->getAttribute('3pt_attempted'),
            $data->getAttribute('3pt')
        );

        $freeThrowPct = $this->getStatPercentage(
            $data->getAttribute('free_throws_attempted'),
            $data->getAttribute('free_throws')
        );

        $totalRebounds = $data->getAttribute('offensive_rebounds') + $data->getAttribute('defensive_rebounds');
        $totalPoints = ($data->getAttribute('2pt') * 2) + ($data->getAttribute('3pt') * 3) + $data->getAttribute('free_throws');

        return (new PlayerStatsResource())
            ->setFieldGoalPercentage($fieldGoalPct)
            ->setTwoPointPercentage($twoPointPct)
            ->setFreeThrowPercentage($freeThrowPct)
            ->setTotalRebounds($totalRebounds)
            ->setTotalPoints($totalPoints)
            ->setThreePointPercentage($threePointPct);
    }

    private function getStatPercentage(int $attempted, int $made): string
    {
        $result = $attempted ? (\round($made / $attempted, 2) * 100) : 0;

        return \sprintf('%s%%', $result);
    }
}