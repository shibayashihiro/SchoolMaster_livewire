<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserSchool
 *
 * @property int $id
 * @property int $user_id
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereUserId($value)
 * @mixin \Eloquent
 * @property int $approval_status 0->pending, 1->approved, 2->rejected
 * @property int|null $approved_by
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchool whereApprovedBy($value)
 */
class UserSchool extends Model
{
    use HasFactory;

    protected $fillable = ['school_id','user_id'];
}
