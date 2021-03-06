<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Response;

final class EmptyResource extends BaseResponseResource
{
    /**
     * EmptyResource constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * Return the response for this resource.
     * This is abstracted away from the "toArray" function to avoid the
     * need to keep having to suppress all of the inspections around it
     *
     * @return mixed[]
     */
    public function getResponse(): array
    {
        return [];
    }

    /**
     * The status code for responses generated by this resource
     */
    protected function getStatusCode(): int
    {
        return Response::HTTP_NO_CONTENT;
    }
}
