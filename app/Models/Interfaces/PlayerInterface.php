<?php

declare(strict_types=1);

namespace App\Models\Interfaces;

interface PlayerInterface
{
    public function getPlayerId(): string;
}