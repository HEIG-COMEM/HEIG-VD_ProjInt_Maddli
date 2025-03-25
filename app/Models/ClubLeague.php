<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * The users that belong to the club_league. (I.e. the users that are coaching in the club at the league)
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'club_league_user', 'club_league_id', 'user_id')->chaperone();
    }

    /**
     * Get the club_league pair by club name and league name.
     *
     * @param string $clubName
     * @param string $leagueName
     * @return ClubLeague
     */
    public function getClubLeaguePair(string $clubName, string $leagueName): ClubLeague
    {
        return $this->whereHas('club', function ($query) use ($clubName) {
            $query->where('name', $clubName);
        })->whereHas('league', function ($query) use ($leagueName) {
            $query->where('name', $leagueName);
        })->first();
    }
}
