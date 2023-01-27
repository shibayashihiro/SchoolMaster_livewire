<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserStudyDestination
 *
 * @property int $id
 * @property int $user_id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $city_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserStudyDestination whereCityId($value)
 */
class UserStudyDestination extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','country_id'];
}
