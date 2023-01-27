<?php

namespace App\Models\Conversation;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Conversation\Conversation
 *
 * @property int $id
 * @property int $from_user
 * @property int $to_user
 * @property int|null $status unread, read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereFromUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereToUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $fromUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Conversation\ConversationMessage[] $messages
 * @property-read int|null $messages_count
 * @property-read User|null $toUser
 * @property int|null $inquiry
 * @method static \Illuminate\Database\Eloquent\Builder|Conversation whereInquiry($value)
 * @method static Builder|Conversation inquiries()
 * @method static Builder|Conversation simpleMessages()
 */
class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['from_user','to_user','status','inquiry'];


    public function scopeInquiries(Builder $query): Builder
    {
        return $query->where('inquiry',1);
    }

    public function scopeSimpleMessages(Builder $query): Builder
    {
        return $query->where('inquiry','!=',1);
    }


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
        return $this->hasMany(ConversationMessage::class,'chat_conversation_id');
    }
}
