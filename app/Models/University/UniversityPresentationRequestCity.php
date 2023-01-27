<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityPresentationRequestCity
 *
 * @property int $id
 * @property int $request_id
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestCity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityPresentationRequestCity extends Model
{
    use HasFactory;

    protected $fillable = ['request_id','city_id'];


}
