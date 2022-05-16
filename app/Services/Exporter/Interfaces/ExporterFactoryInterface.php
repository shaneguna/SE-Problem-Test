<?php

declare(strict_types=1);

namespace App\Services\Exporter\Interfaces;

interface ExporterFactoryInterface
{
    public function make(string $type): ?ExporterDriverInterface;
}
