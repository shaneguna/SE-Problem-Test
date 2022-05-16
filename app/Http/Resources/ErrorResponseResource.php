<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Symfony\Component\HttpFoundation\Response;

final class ErrorResponseResource extends BaseResponseResource
{
    /**
     * @var int|null
     */
    private $status;

    /**
     * ErrorResponseResource constructor.
     */
    public function __construct(string $message, ?int $status = null)
    {
        parent::__construct($message);

        $this->status = $status;
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
        $statusCode = $this->getStatusCode();

        return [
            'status' => $statusCode,
            'title' => Response::$statusTexts[$statusCode],
            'message' => $this->resource,
        ];
    }

    /**
     * @noinspection PhpMissingParentCallCommonInspection
     *
     * Return the HTTP status for this error (default to 400)
     */
    protected function getStatusCode(): int
    {
        $statusCode = $this->status ?? Response::HTTP_BAD_REQUEST;

        // Make sure the code is valid, otherwise default to 400
        return isset(Response::$statusTexts[$statusCode]) ? $statusCode : Response::HTTP_BAD_REQUEST;
    }
}
