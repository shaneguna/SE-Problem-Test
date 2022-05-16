<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class PlayerDataExportRequest extends FormRequest
{
    private const ALLOWED_TYPES = [
        'player',
        'playerStats'
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => \sprintf('required|string|in:%s', \implode(',',self::ALLOWED_TYPES)),
            'playerId' => 'nullable|string',
            'team' => 'nullable|string',
            'position' => 'nullable|string',
            'country' => 'nullable|string',
        ];
    }
}
