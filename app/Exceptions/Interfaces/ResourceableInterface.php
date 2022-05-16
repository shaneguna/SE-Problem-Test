<?php

declare(strict_types=1);

namespace App\Exceptions\Interfaces;

interface ResourceableInterface
{
    public function getErrorCode(): ?string;

    public function getHttpStatus(): int;
}
