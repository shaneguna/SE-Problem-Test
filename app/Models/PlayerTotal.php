<?php

namespace App\Models;

use App\Models\Interfaces\PlayerInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class PlayerTotal extends Model implements PlayerInterface
{
    use HasFactory;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Roster::class);
    }

    public function getPlayerId(): string
    {
        return $this->getAttribute('player_id');
    }
}
