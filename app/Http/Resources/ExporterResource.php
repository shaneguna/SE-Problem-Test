<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Interfaces\PlayerInterface;
use App\Services\PlayerStats\Interfaces\PlayerStatsDetailsMapperInterface;
use App\Services\PlayerStats\Mappers\PlayerStatsDetailsMapper;

final class ExporterResource extends BaseResponseResource
{
    private PlayerStatsDetailsMapperInterface $playerStatsDetailsMapper;

    public function __construct(PlayerInterface $resource)
    {
        $this->playerStatsDetailsMapper = new PlayerStatsDetailsMapper();

        parent::__construct($resource);
    }

    protected function getResponse(): array
    {
        $response =  [
            'country' => $this->resource->getAttribute('nationality'),
            'player' => $this->resource->getAttribute('name'),
            'playerId' => $this->resource->getPlayerId(),
            'position' => $this->resource->getAttribute('position'),
            'team' => $this->resource->getAttribute('team'),
            'stats' => $this->playerStatsDetailsMapper->map($this->resource)->jsonSerialize(),
        ];

        $this->trim($response);

        return $response;
    }
}