<?php

namespace App\Models\School;

use App\Models\Fairs\Fair;
use App\Models\Institutes\University;
use App\Models\University\UniversityEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\School\SchoolPointHistory
 *
 * @property int $id
 * @property int $school_id
 * @property int|null $school_point_type_id
 * @property int|null $withdrawal_id
 * @property string|null $description
 * @property float $points_in
 * @property float $points_out
 * @property int|null $by_user
 * @property int|null $for_student
 * @property int|null $for_fair
 * @property int|null $for_university
 * @property int|null $for_university_event
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\School\SchoolPointType|null $pointType
 * @property-read \App\Models\School\SchoolPointWithdrawalRequest|null $pointWithdrawal
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereForFair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereForStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereForUniversity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereForUniversityEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory wherePointsIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory wherePointsOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereSchoolPointTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointHistory whereWithdrawalId($value)
 * @mixin \Eloquent
 * @property-read Fair|null $forFair
 * @property-read User|null $forStudent
 * @property-read University|null $forUniversity
 * @property-read UniversityEvent|null $forUniversityEvent
 */
class SchoolPointHistory extends Model
{
    use HasFactory;
    protected $fillable = ['school_id','school_point_type_id','withdrawal_id','description','points_in','points_out',
        'by_user','for_student','for_fair','for_university','for_university_event'];

    /**
     * @return BelongsTo
     */
    public function pointType(): BelongsTo
    {
        return $this->belongsTo(SchoolPointType::class,'school_point_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function pointWithdrawal(): BelongsTo
    {
        return $this->belongsTo(SchoolPointWithdrawalRequest::class,'withdrawal_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'by_user');
    }

    /**
     * @return BelongsTo
     */
    public function forStudent(): BelongsTo
    {
        return $this->belongsTo(User::class,'for_student');
    }


    /**
     * @return BelongsTo
     */
    public function forUniversity(): BelongsTo
    {
        return $this->belongsTo(University::class,'for_university');
    }

    /**
     * @return BelongsTo
     */
    public function forFair(): BelongsTo
    {
        return $this->belongsTo(Fair::class,'for_fair');
    }

    /**
     * @return BelongsTo
     */
    public function forUniversityEvent(): BelongsTo
    {
        return $this->belongsTo(UniversityEvent::class,'for_university_event');
    }

}
