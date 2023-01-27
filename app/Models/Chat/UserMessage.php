<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat\UserMessage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage query()
 * @mixin \Eloquent
 */
class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'users_messages';

    protected $fillable = ['channel', 'user_id', 'unread_count'];
}
