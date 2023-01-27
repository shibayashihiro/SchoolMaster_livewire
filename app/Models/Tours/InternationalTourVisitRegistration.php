<?php

namespace App\Models\Tours;

use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Tours\InternationalTourVisitRegistration
 *
 * @property int $id
 * @property int $tour_id
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $requested_by
 * @property int $processed_by
 * @property int $status
 * @property string|null $remarks
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitRegistration whereStatus($value)
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @property-read School|null $school
 * @property-read \App\Models\Tours\InternationalTourVisitPlan|null $tour
 */
class InternationalTourVisitRegistration extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id','school_id','requested_by','processed_by','status'];


    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(InternationalTourVisitPlan::class,'tour_id');
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'requested_by');
    }

    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }


}
