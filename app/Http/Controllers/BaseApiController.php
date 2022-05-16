<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Interfaces\ResourceableInterface;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\ErrorResponseResource;
use App\Http\Resources\ExceptionResponseResource;
use Rex\Http\Resources\ValidationErrorResponseResource;

abstract class BaseApiController
{
    /**
     * Return a safe response to an error.
     */
    public function respondError(string $message, ?int $status = null): ErrorResponseResource
    {
        return new ErrorResponseResource($message, $status);
    }

    /**
     * Return a safe response to an exception.
     */
    public function respondException(ResourceableInterface $exception): ExceptionResponseResource
    {
        return new ExceptionResponseResource($exception);
    }

    /**
     * Return a safe response to no content.
     */
    public function respondNoContent(): EmptyResource
    {
        return new EmptyResource();
    }

    /**
     * @param string[] $errors
     */
    public function respondValidationError(string $message, array $errors, ?int $statusCode = null): ValidationErrorResponseResource
    {
        return new ValidationErrorResponseResource($message, $errors, $statusCode);
    }
}
