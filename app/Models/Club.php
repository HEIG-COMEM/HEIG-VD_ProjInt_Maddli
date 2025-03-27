<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all users managing the club.
     *
     * @return BelongsToMany
     */
    public function managers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all leagues the club is in.
     *
     * @return BelongsToMany
     */
    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class);
    }

    public function coaches()
    {
        $clubLeagues = ClubLeague::where('club_id', $this->id)->get();
        $coaches = [];

        foreach ($clubLeagues as $clubLeague) {
            $clubLeague->coaches()->each(function ($coaching) use (&$coaches) {
                $coaches[] = $coaching->user;
            });
        }

        return $coaches;
    }
}
