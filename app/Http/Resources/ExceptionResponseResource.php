<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Exceptions\Interfaces\ResourceableInterface;
use App\Exceptions\Interfaces\ResourceExceptionInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class ExceptionResponseResource extends BaseResponseResource
{
    /**
     * Return a structured array to render this exception
     *
     * @return mixed[]
     */
    public function getResponse(): array
    {
        $status = $this->getStatusCode();

        return [
            'status' => $status,
            'title' => Response::$statusTexts[$status],
            'message' => $this->getMessage() ?? new MissingValue(),
        ];
    }

    /**
     * Get the http status code for this exception
     *
     * @noinspection PhpMissingParentCallCommonInspection
     */
    protected function getStatusCode(): int
    {
        if ($this->resource instanceof HttpException || $this->resource instanceof ResourceExceptionInterface) {
            return $this->resource->getStatusCode();
        }

        if ($this->resource instanceof ResourceableInterface) {
            return $this->resource->getHttpStatus();
        }

        if ($this->resource instanceof ValidationException) {
            return Response::HTTP_UNPROCESSABLE_ENTITY;
        }

        if ($this->resource instanceof AuthorizationException) {
            return Response::HTTP_UNAUTHORIZED;
        }

        if ($this->resource instanceof ModelNotFoundException) {
            return Response::HTTP_NOT_FOUND;
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    /**
     * Get the user friendly message for this provider exception
     */
    private function getMessage(): ?string
    {
        if ($this->resource instanceof ResourceExceptionInterface) {
            return $this->resource->getResourceMessage();
        }

        if ($this->resource instanceof ResourceableInterface) {
            return $this->resource->getMessage();
        }

        return null;
    }
}
