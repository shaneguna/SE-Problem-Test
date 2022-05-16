<?php

declare(strict_types=1);

namespace App\Services\Exporter;

use App\Services\Exporter\Interfaces\ExporterDriverInterface;
use App\Services\Exporter\Interfaces\ExporterFactoryInterface;
use App\Services\Utilities\CollectorHelper;

final class ExporterFactory implements ExporterFactoryInterface
{
    /**
     * @var iterable<\App\Services\Exporter\Interfaces\ExporterDriverInterface>
     */
    private iterable $drivers;

    /**
     * @param iterable<\App\Services\Exporter\Interfaces\ExporterDriverInterface> $drivers
     */
    public function __construct(iterable $drivers)
    {
        $this->drivers = CollectorHelper::filterByClass($drivers, ExporterDriverInterface::class);
    }

    public function make(string $type): ?ExporterDriverInterface
    {
        foreach ($this->drivers as $driver) {
            if ($driver->supports($type) === false) {
                continue;
            }

            return $driver;
        }

        return null;
    }
}
