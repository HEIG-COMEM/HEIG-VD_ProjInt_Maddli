<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * Get all leagues in the nation.
     *
     * @return HasMany
     */
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
}
