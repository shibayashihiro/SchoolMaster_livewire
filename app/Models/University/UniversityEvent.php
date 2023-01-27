<?php

namespace App\Models\University;

use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\University\UniversityEvent
 *
 * @property int $id
 * @property int $university_event_type_id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property mixed|null $start_datetime
 * @property mixed|null $end_datetime
 * @property int|null $max_students
 * @property string|null $location
 * @property string|null $map_link
 * @property int $university_id
 * @property int|null $created_by
 * @property int $approval_status Approved By UNIRANKS TEAM
 * @property int $status
 * @property int|null $process_by
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereMaxStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereProcessBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereUniversityEventTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $invitedSchool
 * @property-read int|null $invited_school_count
 * @property-read User|null $processedBy
 * @property-read UniversityEvent|null $type
 * @property-read University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $attendance
 * @property-read int|null $attendance_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent upcoming()
 * @property int|null $fair_type_id 1->Physicals, 2->Virtual, 3->Hybrid
 * @property int|null $fee_range_id
 * @property int|null $city_id
 * @property int|null $country_id
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereFairTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEvent whereFeeRangeId($value)
 */
class UniversityEvent extends Model
{
    use HasFactory;

    protected $fillable = ['university_event_type_id','title','short_description','description','start_datetime','end_datetime',
        'max_students','location','map_link','university_id','created_by','approval_status','status',
        'process_by','remarks'];

    //TODO:ADD APPEND ATTRIBUTES
    function scopeUpcoming($query)
    {
        return $query->whereRaw('DATE(start_datetime) >= ?', Carbon::now()->toDateString());
    }
    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(UniversityEvent::class,'university_event_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }

    /**
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }

    /**
     * @return BelongsToMany
     */
    public function invitedSchool(): BelongsToMany
    {
        return $this->belongsToMany(School::class,UniversityEventInvitation::class,'university_event_id','school_id');
    }

    /**
     * @return BelongsToMany
     */
    public function attendance(): BelongsToMany
    {
        return $this->belongsToMany(User::class,UniversityEventStudentAttendance::class,'university_event_id','student_id');
    }
}
