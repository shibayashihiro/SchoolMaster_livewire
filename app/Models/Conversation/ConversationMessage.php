<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Conversation\ConversationMessage
 *
 * @property int $id
 * @property int $conversation_id
 * @property int|null $conversation_message_id to group files attached to a message
 * @property string|null $message
 * @property string|null $file_path
 * @property int $status unread, read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereConversationMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConversationMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|ConversationMessage[] $fileGroup
 * @property-read int|null $file_group_count
 * @property-read string $file_url
 */
class ConversationMessage extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id','conversation_message_id','message','file_path','status'];

    protected $appends = ['file_url'];

    public function getFileUrlAttribute(): string
    {
        return \AppConst::CDN_PATH.'/'.$this->file_path;
    }

    public function fileGroup(): HasMany
    {
        return $this->hasMany(ConversationMessage::class,'conversation_message_id');
    }
}
