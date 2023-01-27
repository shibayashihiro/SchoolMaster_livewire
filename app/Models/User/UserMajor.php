<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserMajor
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $major_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor whereMajorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMajor whereUserId($value)
 */
class UserMajor extends Model
{
    use HasFactory;

    protected $guarded = [];
}
