<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserGuardian
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $mobile_country_code
 * @property string|null $mobile_number
 * @property string|null $relation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereMobileCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserGuardian whereUserId($value)
 * @mixin \Eloquent
 */
class UserGuardian extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','first_name','last_name','email','mobile_country_code','mobile_number','relation'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
