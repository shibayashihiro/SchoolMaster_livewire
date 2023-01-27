<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Conversation\ChatConversationMessage
 *
 * @property int $id
 * @property int $chat_conversation_id
 * @property int|null $chat_conversation_message_id to group files attached to a message
 * @property string|null $message
 * @property string|null $file_path
 * @property int|null $reply_to_message for reply to a specific message
 * @property int $status unread, read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereChatConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereChatConversationMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereReplyToMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatConversationMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|ChatConversationMessage[] $fileGroup
 * @property-read int|null $file_group_count
 * @property-read string $file_url
 * @property-read ChatConversationMessage|null $replyForMessage
 */
class ChatConversationMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_conversation_id','chat_conversation_message_id','message','file_path','reply_to_message',
        'status'];
    protected $appends = ['file_url'];

    public function getFileUrlAttribute(): string
    {
        return \AppConst::CDN_PATH.'/'.$this->file_path;
    }

    public function replyForMessage(): BelongsTo
    {
        return $this->belongsTo(ChatConversationMessage::class,'reply_to_message');
    }

    public function fileGroup(): HasMany
    {
        return $this->hasMany(ChatConversationMessage::class,'chat_conversation_message_id');
    }
}
