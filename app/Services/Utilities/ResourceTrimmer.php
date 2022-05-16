<?php

declare(strict_types=1);

namespace App\Services\Utilities;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class ResourceTrimmer extends JsonResource
{
    /**
     * @return mixed[]
     */
    public function trim(array &$data): array
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}