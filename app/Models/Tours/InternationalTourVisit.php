<?php

namespace App\Models\Tours;

use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Tours\InternationalTourVisit
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property mixed|null $start_datetime
 * @property mixed|null $end_datetime
 * @property float|null $charges_in_usd
 * @property float|null $charges_in_points
 * @property int|null $number_of_universities
 * @property int|null $created_by
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereChargesInPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereChargesInUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereNumberOfUniversities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisit whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $participantSchools
 * @property-read int|null $participant_schools_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $participantUniversities
 * @property-read int|null $participant_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tours\InternationalTourVisitPlan[] $plan
 * @property-read int|null $plan_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tours\InternationalTourVisitRegistration[] $registrations
 * @property-read int|null $registrations_count
 */
class InternationalTourVisit extends Model
{
    use HasFactory;
    protected $fillable = ['title','short_description','description','start_datetime','end_datetime',
        'charges_in_usd','charges_in_points','number_of_universities','created_by','status'];

    public function participantUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class,InternationalTourVisitUniversity::class,'tour_id','university_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(InternationalTourVisitRegistration::class,'tour_id');
    }

    /**
     * @return BelongsToMany
     */
    public function participantSchools(): BelongsToMany
    {
        return $this->belongsToMany(School::class,InternationalTourVisitRegistration::class,'tour_id','school_id')->wherePivot('status',\AppConst::APPROVED);
    }


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function plan(): HasMany
    {
        return $this->hasMany(InternationalTourVisitPlan::class,'tour_id');
    }
}
