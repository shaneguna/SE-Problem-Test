<?php

namespace App\Models;

use App\Models\Interfaces\PlayerInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Roster extends Model implements PlayerInterface
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roster';

    public function getPlayerId(): string
    {
        return $this->getAttribute('id');
    }

    public function playerStats(): HasOne
    {
        return $this->hasOne(PlayerTotal::class, 'player_id');
    }
}
