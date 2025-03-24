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
}
