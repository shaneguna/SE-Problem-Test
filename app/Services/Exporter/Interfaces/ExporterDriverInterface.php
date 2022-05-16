<?php

declare(strict_types=1);

namespace App\Services\Exporter\Interfaces;

use App\Http\Resources\ExporterCollectionResource;
use App\Services\Roster\Resources\RosterCriteriaResource;

interface ExporterDriverInterface
{
    public function export(RosterCriteriaResource $criteriaResource): ExporterCollectionResource;

    public function supports(string $type): bool;
}
