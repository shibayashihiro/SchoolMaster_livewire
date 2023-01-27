<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tours\InternationalTourVisitUniversity
 *
 * @property int $id
 * @property int $tour_id
 * @property int $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitUniversity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InternationalTourVisitUniversity extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id','university_id'];
}
