<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tours\InternationalTourVisitInvitation
 *
 * @property int $id
 * @property int $tour_id
 * @property int $school_id
 * @property int $status
 * @property int $accepted_by_school
 * @property int|null $processed_by
 * @property int|null $requested_by accepted which school user
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereAcceptedBySchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitInvitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InternationalTourVisitInvitation extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id','school_id','status','accepted_by_school','processed_by','requested_by','remarks'];
}
