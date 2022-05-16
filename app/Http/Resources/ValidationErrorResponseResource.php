<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\BaseResponseResource;
use Symfony\Component\HttpFoundation\Response;

final class ValidationErrorResponseResource extends BaseResponseResource
{
    /**
     * @var string[]|null
     */
    private $errors;

    /**
     * @var int|null
     */
    private $statusCode;

    /**
     * @param string[] $errors
     */
    public function __construct(string $message, array $errors, ?int $statusCode = null)
    {
        parent::__construct($message);

        $this->statusCode = $statusCode ?? Response::HTTP_BAD_REQUEST;
        $this->errors = $errors;
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
        return [
            'status' => $this->statusCode,
            'title' => Response::$statusTexts[$this->statusCode] ?? Response::HTTP_BAD_REQUEST,
            'message' => $this->resource,
            'errors' => $this->errors,
        ];
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
