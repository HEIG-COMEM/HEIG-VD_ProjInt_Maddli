<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClubLeague extends Model
{
    protected $table = 'club_league';
    protected $fillable = ['club_id', 'league_id'];

    /**
     * Get the club that owns the club_league.
     *
     * @return BelongsTo
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * Get the league that owns the club_league.
     *
     * @return BelongsTo
     */
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    /**
     * The users that belong to the club league pair. (I.e. the users that are coaching in the club at the league)
     *
     * @return HasMany
     */
    public function coaches(): HasMany
    {
        return $this->hasMany(Coaching::class);
    }
}
