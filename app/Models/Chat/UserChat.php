<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat\UserChat
 *
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChat query()
 * @mixin \Eloquent
 */
class UserChat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
