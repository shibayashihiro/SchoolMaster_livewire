<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Tours\InternationalTourVisitPlan
 *
 * @property int $id
 * @property int $tour_id
 * @property string|null $day
 * @property int|null $fly_from
 * @property int|null $fly_to
 * @property mixed|null $fly_at_datetime
 * @property mixed|null $land_at_datetime
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereFlyAtDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereFlyFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereFlyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereLandAtDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternationalTourVisitPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Tours\InternationalTourVisit|null $tour
 */
class InternationalTourVisitPlan extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id','day','fly_from','fly_to','fly_at_datetime','land_at_datetime'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(InternationalTourVisit::class,'tour_id');
    }
}
