<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserHobby
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $hobby_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby whereHobbyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHobby whereUserId($value)
 */
class UserHobby extends Model
{
    use HasFactory;

    protected $guarded = [];
}
