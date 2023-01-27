<?php

namespace App\Models\Fairs;

use App\Models\General\Major;
use App\Models\Institutes\Institute;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\School\SchoolPointHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Fairs\Fair
 *
 * @property int $id
 * @property int $type
 * @property int|null $event_type_id what of event it is, normal or career talk
 * @property int|null $school_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $g12
 * @property string|null $g11
 * @property string|null $max
 * @property string|null $fair_name
 * @property int $active_status
 * @property int|null $approval_status
 * @property string|null $maps_link
 * @property string|null $f_g_12_fee
 * @property array|null $school_curriculums
 * @property int|null $gender_id
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $number_of_halls used for career talk events
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $arrivedUniversities
 * @property-read int|null $arrived_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $attendance
 * @property-read int|null $attendance_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairEditRequest[] $editRequests
 * @property-read int|null $edit_requests_count
 * @property-read \App\Models\Fairs\EventType|null $eventType
 * @property-read \App\Models\Fairs\FairType|null $fairType
 * @property-read bool $is_approved
 * @property-read bool $is_editable
 * @property-read bool $time_barred
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairEditHistory[] $history
 * @property-read int|null $history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\Invitation[] $invitation
 * @property-read int|null $invitation_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $invitedUniversities
 * @property-read int|null $invited_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $lateUniversities
 * @property-read int|null $late_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Major[] $majors
 * @property-read int|null $majors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $registeredUniversities
 * @property-read int|null $registered_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairReserveSessionRequest[] $reservationRequests
 * @property-read int|null $reservation_requests_count
 * @property-read School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairSession[] $sessions
 * @property-read int|null $sessions_count
 * @property-read \App\Models\Fairs\FairTask|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $universitiesNotArrived
 * @property-read int|null $universities_not_arrived_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $universityAttendancePending
 * @property-read int|null $university_attendance_pending_count
 * @method static \Illuminate\Database\Eloquent\Builder|Fair careerTalk()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair simpleFair()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair upcoming()
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereActiveStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereEventTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereFG12Fee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereFairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereG11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereG12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereMapsLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereNumberOfHalls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereSchoolCurriculums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $confirmedUniversities
 * @property-read int|null $confirmed_universities_count
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|Fair whereDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolPointHistory[] $schoolCreditEarned
 * @property-read int|null $school_credit_earned_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairRating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $ratedBy
 * @property-read int|null $rated_by_count
 */
class Fair extends Model
{
    use HasFactory;

    protected $table = 'fairs';

    protected $fillable = [
        'type',
        'school_id',
        'start_date',
        'end_date',
        'g12',
        'g11',
        'max',
        'fair_name',
        'active_status',
        'approval_status',
        'maps_link',
        'f_g_12_fee',
        'school_curriculums',
        'gender_id',
        'user_id',
        'event_type_id',
        'number_of_halls'
    ];

    protected $appends = [
        'active_status',
        'time_barred',
        'is_approved',
        'is_editable'
    ];

    protected $casts = ['school_curriculums' => 'array'];


    /**
     * Definition: 'STATUS ACTIVE' attribute values
     */
    const FAIR_STATUS_ACTIVE = 1;
    const FAIR_STATUS_DEACTIVE = 0;
    const FAIR_STATUS = 3;


    /**
     * Definition: 'active_status' attribute values
     */
    const FUTURE = 1;
    const PRESENT = 2;
    const PAST = 3;

    /**
     * Definition: 'approval_status' attribute values
     */
    const AWAITING = 0;
    const APPROVED = 1;
    const REJECTED = 2;

    public function getActiveStatusAttribute(): int
    {
        $now = Carbon::now();
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date);
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date);

        if ($start > $now) {
            return Fair::FUTURE;
        } elseif ($start < $now && $end > $now) {
            return Fair::PRESENT;
        } else {
            return Fair::PAST;
        }
    }

    public function getIsEditableAttribute(): bool
    {
        $now = Carbon::now()->toDateString();
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date)->toDateString();
        return $start > $now;
    }

    public function getIsApprovedAttribute(): bool
    {
        return $this->approval_status == self::APPROVED;
    }

    public function getTimeBarredAttribute(): bool
    {
        return now()->diffInSeconds($this->start_date) < \AppConst::TWO_DAYS_IN_SECONDS;
    }

    function scopeUpcoming($query)
    {
        return $query->whereRaw('DATE(start_date) >= ?', Carbon::now()->toDateString());
    }

    function scopeSimpleFair($query)
    {
        return $query->where('event_type_id',\AppConst::FAIR);
    }

    function scopeCareerTalk($query)
    {
        return $query->where('event_type_id',\AppConst::CAREER_TALK);
    }

    /**
     * @return BelongsTo
     */
    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    /**
     * @return HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(FairSession::class, 'fair_id');
    }

    /**
     * @return HasManyThrough
     */
    public function reservationRequests(): HasManyThrough
    {
        return $this->hasManyThrough(FairReserveSessionRequest::class, FairSession::class);
    }

    /**
     * @return BelongsToMany
     */
    public function majors(): BelongsToMany
    {
        return $this->belongsToMany(Major::class, FairSession::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function fairType(): BelongsTo
    {
        return $this->belongsTo(FairType::class, 'type', 'id');
    }

    public function invitedUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class);
    }

    public function registeredUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('status', \AppConst::INVITATION_ACCEPTED);
    }

    public function confirmedUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('accepted_by_school', \AppConst::REGISTARTION_ACCEPTED)->withPivot([
            'accepted_by_school','status','university_attendance_status','accepted_by_school','id'
        ]);
    }

    public function arrivedUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('university_attendance_status', \AppConst::UNIVERSITY_ATTENDANCE_ARRIVED);
    }

    public function universityAttendancePending(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('university_attendance_status', \AppConst::UNIVERSITY_ATTENDANCE_PENDING);
    }

    public function lateUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('university_attendance_status', \AppConst::UNIVERSITY_ATTENDANCE_LATE);
    }

    public function universitiesNotArrived(): BelongsToMany
    {
        return $this->belongsToMany(University::class, Invitation::class)->wherePivot('university_attendance_status','in' ,[\AppConst::UNIVERSITY_ATTENDANCE_NOT_ARRIVED,\AppConst::UNIVERSITY_ATTENDANCE_PENDING]);
    }

    public function schoolCreditEarned(): HasMany
    {
        return $this->hasMany(SchoolPointHistory::class,'for_fair');
    }

    public function invitation(): HasMany
    {
        return $this->hasMany(Invitation::class, 'fair_id', 'id');
    }

    public function task(): HasOne
    {
        return $this->hasOne(FairTask::class, 'fair_id', 'id');
    }

    public function history(): HasMany
    {
        return $this->hasMany(FairEditHistory::class, 'fair_id');
    }

    public function editRequests(): HasMany
    {
        return $this->hasMany(FairEditRequest::class, 'fair_id');
    }

    /**
     * @return BelongsToMany
     */
    public function attendance(): BelongsToMany
    {
        return $this->belongsToMany(User::class,FairStudentAttendance::class,'fair_id','student_id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(FairRating::class,'event_id');
    }

    public function ratedBy():BelongsToMany
    {
        return  $this->belongsToMany(User::class,FairRating::class,'event_id','user_id');
    }
}
