<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\User\UserPossibleUniversity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPossibleUniversity whereUserId($value)
 * @mixin \Eloquent
 */
class UserPossibleUniversity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
