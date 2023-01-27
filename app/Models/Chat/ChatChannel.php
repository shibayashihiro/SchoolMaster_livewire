<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat\ChatChannel
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $representative_id
 * @property int|null $sid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $representative
 * @property-read User|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereRepresentativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatChannel whereUserId($value)
 * @mixin \Eloquent
 */
class ChatChannel extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'representative_id', 'sid'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id', 'id');
    }
}
