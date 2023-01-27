<?php

namespace App\Models\Booth;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\BoothsVisit
 *
 * @property int $id
 * @property int|null $fair_id
 * @property int|null $user_id
 * @property int|null $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothsVisit whereUserId($value)
 * @mixin \Eloquent
 */
class BoothsVisit extends Model
{
    protected $table = 'booths_visits';

    protected $fillable = ['student_id', 'institute_id', 'campus_id', 'fair_id'];
}
