<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Support\Collection;

final class ExporterCollectionResource extends BaseResponseResource
{
    /**
     * @param \Illuminate\Support\Collection<\App\Models\PlayerTotal> $resource
     */
    public function __construct(Collection $resource)
    {
        parent::__construct($resource);
    }

    /**
     * @return mixed[]
     */
    protected function getResponse(): array
    {
        $responses = [];

        foreach ($this->resource as $resource) {
            $responses[] = new ExporterResource($resource);
        }

        return $responses;
    }
}