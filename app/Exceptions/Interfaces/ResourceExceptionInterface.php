<?php

declare(strict_types=1);

namespace App\Exceptions\Interfaces;

interface ResourceExceptionInterface
{
    /**
     * Return the HTTP status code this exception should return
     */
    public function getStatusCode(): int;

    /**
     * Return the public message that should be shown in the response
     */
    public function getResourceMessage(): ?string;
}
