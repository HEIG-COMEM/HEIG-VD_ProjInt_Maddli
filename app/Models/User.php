<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'licence_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
        ];
    }

    /**
     * Get the licence that belongs to the user.
     *
     * @return BelongsTo
     */
    public function licence(): BelongsTo
    {
        return $this->belongsTo(Licence::class);
    }

    /**
     * Get the roles that belong to the user.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get all clubs managed by the user.
     *
     * @return BelongsToMany
     */
    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class);
    }

    /**
     * Get all nations managed by the user.
     *
     * @return BelongsToMany
     */
    public function nations(): BelongsToMany
    {
        return $this->belongsToMany(Nation::class);
    }

    /**
     * Get all club leagues paired with the user. (I.e. Where the user is a coach)
     *
     * @return HasMany
     */
    public function coaching(): HasMany
    {
        return $this->hasMany(Coaching::class, 'user_id');
    }

    /**
     * Get all messages send by the user.
     *
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get all conversations where the user is either the first or second user.
     *
     * @return HasMany
     */
    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class, 'user_one_id')
            ->orWhere('user_two_id', $this->id);
    }
}
