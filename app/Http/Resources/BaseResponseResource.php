<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Services\Utilities\ResourceTrimmer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class BaseResponseResource extends ResourceTrimmer
{
    /**
     * Return this resource as an array
     *
     * @noinspection PhpMissingParentCallCommonInspection
     *
     * @param Request $request
     *
     * @return string[]
     */
    public function toArray($request): array
    {
        return $this->getResponse();
    }

    /**
     * @noinspection ReturnTypeCanBeDeclaredInspection
     *
     * Create an HTTP response that represents the object
     * and set the status code and return type
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function toResponse($request)
    {
        return parent::toResponse($request)
            ->setStatusCode($this->getStatusCode())
            ->withHeaders([
                'Content-Type' => 'application/vnd.api+json',
            ]);
    }

    /**
     * Return the response for this resource.
     * This is abstracted away from the "toArray" function to avoid the
     * need to keep having to suppress all of the inspections around it
     *
     * @return mixed[]
     */
    abstract protected function getResponse(): array;

    /**
     * The status code for responses generated by this resource
     */
    protected function getStatusCode(): int
    {
        return Response::HTTP_OK;
    }
}
