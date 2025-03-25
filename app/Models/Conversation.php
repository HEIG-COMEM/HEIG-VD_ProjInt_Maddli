<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'relation_type_id',
    ];

    /**
     * Get the relation type that belongs to the conversation.
     *
     * @return BelongsTo
     */
    public function relationType(): BelongsTo
    {
        return $this->belongsTo(RelationType::class);
    }

    /**
     * Get the messages that belong to the conversation.
     *
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that is the first user in the conversation.
     *
     * @return BelongsTo
     */
    public function userOne(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    /**
     * Get the user that is the second user in the conversation.
     *
     * @return BelongsTo
     */
    public function userTwo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    /**
     * Get both users in the conversation.
     *
     * @return array<User>
     */
    public function users(): array
    {
        return [$this->userOne, $this->userTwo];
    }
}
