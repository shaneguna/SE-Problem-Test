<?php

declare(strict_types=1);

namespace App\Services\PlayerStats\Interfaces;

use App\Models\Interfaces\PlayerInterface;
use App\Services\PlayerStats\Resources\PlayerStatsResource;

interface PlayerStatsDetailsMapperInterface
{
    public function map(PlayerInterface $data): PlayerStatsResource;
}