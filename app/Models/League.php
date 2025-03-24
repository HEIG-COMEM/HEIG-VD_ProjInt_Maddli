<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class League extends Model
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
     * Get the nation that the league belongs to.
     *
     * @return BelongsTo
     */
    public function nation(): BelongsTo
    {
        return $this->belongsTo(Nation::class);
    }
}
