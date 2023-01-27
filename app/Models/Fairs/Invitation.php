<?php

namespace App\Models\Fairs;

use App\Models\Institutes\Institute;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Fairs\Invitation
 *
 * @property int $id
 * @property int|null $status
 * @property int|null $fair_id
 * @property int|null $school_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @property-read Institute|null $institute
 * @property-read University|null $university
 * @property-read University|null $universityCampus
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $university_id
 * @property int|null $processed_by
 * @property int|null $accepted_by_school
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereAcceptedBySchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUniversityId($value)
 * @property int|null $university_attendance_status 0-> did not arraived1-> arrived2->latenull->pending
 * @method static Builder|Invitation confirmedUniversities()
 * @method static Builder|Invitation universitiesArrived()
 * @method static Builder|Invitation universitiesLate()
 * @method static Builder|Invitation universitiesNotArrived()
 * @method static Builder|Invitation whereUniversityAttendanceStatus($value)
 */
class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    public $timestamps = false;

    protected $fillable = ['status',
        'university_attendance_status',
        'fair_id',
        'school_id',
        'university_id',
        'processed_by',
        'accepted_by_school'];

    /**
     * Definition: 'status' attribute values
     */
    // const INVITED = 0;
    // const CONFIRMED = 1;
    // const REJECTED = 2;
    // const TO_BE_INVITED = 3;
    const ACCEPTED = 1;
    const DECLINED = 2;
    const CANCELLED = 3;

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function fair()
    {
        return $this->belongsTo(Fair::class, 'fair_id', 'id');
    }

    public function  scopeUniversitiesArrived(Builder $query): Builder
    {
        return $query->where('university_attendance_status', \AppConst::UNIVERSITY_ATTENDANCE_ARRIVED);
    }

    public function  scopeUniversitiesNotArrived(Builder $query): Builder
    {
        return $query->where('university_attendance_status','in', [\AppConst::UNIVERSITY_ATTENDANCE_NOT_ARRIVED,\AppConst::UNIVERSITY_ATTENDANCE_PENDING]);
    }
    public function  scopeUniversitiesLate(Builder $query): Builder
    {
        return $query->where('university_attendance_status', \AppConst::UNIVERSITY_ATTENDANCE_LATE);
    }

    public function scopeConfirmedUniversities(Builder $query): Builder
    {
        return $query->where('accepted_by_school', \AppConst::REGISTARTION_ACCEPTED);

    }

}
