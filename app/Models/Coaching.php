<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coaching extends Model
{
    protected $table = 'club_league_user';
    protected $fillable = ['club_league_id', 'user_id'];

    /**
     * Get the club_league that the user is coaching in.
     *
     * @return BelongsTo
     */
    public function clubLeague(): BelongsTo
    {
        return $this->belongsTo(ClubLeague::class);
    }

    /**
     * Get the user that is coaching in the club_league.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
