<?php

declare(strict_types=1);

namespace App\Services\Exporter\Enums;

enum ExporterDriverTypesEnum: string
{
    case PLAYER_TYPE = 'player';
    case PLAYER_STATS_TYPE = 'playerStats';

    /**
     * @var string
     */
    public const PLAYER = self::PLAYER_TYPE;

    /**
     * @var string
     */
    public const PLAYER_STATS = self::PLAYER_STATS_TYPE;
}