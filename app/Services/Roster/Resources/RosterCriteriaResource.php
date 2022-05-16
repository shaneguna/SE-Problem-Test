<?php

declare(strict_types=1);

namespace App\Services\Roster\Resources;

use App\Services\Utilities\ResourceTrimmer;
use App\Services\Utilities\Traits\InitialisableTrait;
use App\Services\Utilities\Traits\Interfaces\InitialisableInterface;

final class RosterCriteriaResource extends ResourceTrimmer implements InitialisableInterface
{
    use InitialisableTrait;

    private ?string $playerId = null;

    private ?string $country = null;

    private ?string $position = null;

    private ?string $name = null;

    private ?string $team = null;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getPlayerId(): ?string
    {
        return $this->playerId;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setCountry(?string $country = null): self
    {
        $this->country = $country;

        return $this;
    }

    public function setPlayerId(?string $playerId = null): self
    {
        $this->playerId = $playerId;

        return $this;
    }

    public function setPosition(?string $position = null): self
    {
        $this->position = $position;

        return $this;
    }

    public function setName(?string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function setTeam(?string $team = null): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        $criteriaSet = [
            'country' => $this->getCountry(),
            'name' => $this->getName(),
            'playerId' => $this->getPlayerId(),
            'position' => $this->getPosition(),
            'team' => $this->getTeam(),
        ];

        $this->trim($criteriaSet);

        return $criteriaSet;
    }
}
