<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class League extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nation_id',
    ];

    /**
     * Get the nation that the league belongs to.
     *
     * @return BelongsTo
     */
    public function nation(): BelongsTo
    {
        return $this->belongsTo(Nation::class);
    }

    /**
     * Get all clubs in the league.
     *
     * @return BelongsToMany
     */
    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class);
    }
}
