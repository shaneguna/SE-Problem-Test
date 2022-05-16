<?php

declare(strict_types=1);

namespace App\Services\Utilities\Traits\Interfaces;

interface InitialisableInterface
{
    /**
     * @param mixed[]|null $payload
     */
    public function __construct(?array $payload = []);
}
