<?php

declare(strict_types=1);

namespace App\Services\PlayerStats\Resources;

use App\Services\Utilities\Traits\InitialisableTrait;
use App\Services\Utilities\Traits\Interfaces\InitialisableInterface;

final class PlayerStatsResource implements InitialisableInterface
{
    use InitialisableTrait;

    private ?string $fieldGoalPercentage = null;

    private ?string $freeThrowPercentage = null;

    private ?string $threePointPercentage = null;

    private ?int $totalPoints = null;

    private ?int $totalRebounds = null;

    private ?string $twoPointPercentage = null;

    public function getFieldGoalPercentage(): ?string
    {
        return $this->fieldGoalPercentage;
    }

    public function getFreeThrowPercentage(): ?string
    {
        return $this->freeThrowPercentage;
    }

    public function getThreePointPercentage(): ?string
    {
        return $this->threePointPercentage;
    }

    public function getTotalPoints(): ?int
    {
        return $this->totalPoints;
    }

    public function getTotalRebounds(): ?int
    {
        return $this->totalRebounds;
    }

    public function getTwoPointPercentage(): ?string
    {
        return $this->twoPointPercentage;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        return [
            'fieldGooalPercentage' => $this->getFieldGoalPercentage(),
            'freeThrowPercentage' => $this->getFreeThrowPercentage(),
            'threePointsPercentage' => $this->getThreePointPercentage(),
            'totalPoints' => $this->getTotalPoints(),
            'totalRebounds' => $this->getTotalRebounds(),
            'twoPointPercentage' => $this->getTwoPointPercentage(),
        ];
    }

    public function setFieldGoalPercentage(?string $fieldGoalPercentage): PlayerStatsResource
    {
        $this->fieldGoalPercentage = $fieldGoalPercentage;

        return $this;
    }

    public function setFreeThrowPercentage(?string $freeThrowPercentage): PlayerStatsResource
    {
        $this->freeThrowPercentage = $freeThrowPercentage;

        return $this;
    }

    public function setThreePointPercentage(?string $threePointPercentage): PlayerStatsResource
    {
        $this->threePointPercentage = $threePointPercentage;

        return $this;
    }

    public function setTotalPoints(?int $totalPoints): PlayerStatsResource
    {
        $this->totalPoints = $totalPoints;

        return $this;
    }

    public function setTotalRebounds(?int $totalRebounds): PlayerStatsResource
    {
        $this->totalRebounds = $totalRebounds;

        return $this;
    }

    public function setTwoPointPercentage(?string $twoPointPercentage): PlayerStatsResource
    {
        $this->twoPointPercentage = $twoPointPercentage;

        return $this;
    }
}
