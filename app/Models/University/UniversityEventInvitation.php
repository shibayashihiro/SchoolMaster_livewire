<?php

namespace App\Models\University;

use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\University\UniversityEventInvitation
 *
 * @property int $id
 * @property int $university_event_id
 * @property int $school_id
 * @property int $status
 * @property int $accepted_by_school
 * @property int|null $processed_by
 * @property int|null $requested_by accepted which school user
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereAcceptedBySchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereUniversityEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\University\UniversityEvent|null $event
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @property-read School|null $school
 * @property int|null $school_attendance_status null,0->pending,1->arrived,2->late,3->didnt
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventInvitation whereSchoolAttendanceStatus($value)
 */
class UniversityEventInvitation extends Model
{
    use HasFactory;
    protected $fillable = ['school_id','university_event_id','status','accepted_by_school','processed_by','requested_by',
        'remarks'];


    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }


    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(UniversityEvent::class,'university_event_id');
    }

    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'requested_by');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }

}
