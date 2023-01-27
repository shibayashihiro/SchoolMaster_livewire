<?php

namespace App\Models\Conversation;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Conversation\ChatConversation
 *
 * @property int $id
 * @property int $from_user
 * @property int $to_user
 * @property int|null $status unread, read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereFromUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereToUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $fromUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Conversation\ChatConversationMessage[] $messages
 * @property-read int|null $messages_count
 * @property-read User|null $toUser
 */
class ChatConversation extends Model
{
    use HasFactory;

    protected $fillable = ['from_user','to_user','status'];

    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'from_user');
    }

    /**
     * @return BelongsTo
     */
    public function toUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'to_user');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatConversationMessage::class,'conversation_id');
    }
}
