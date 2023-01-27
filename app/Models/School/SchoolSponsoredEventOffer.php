<?php

namespace App\Models\School;

use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\School\SchoolSponsoredEventOffer
 *
 * @property int $id
 * @property int $sponsored_event_id
 * @property int $university_id
 * @property float $amount
 * @property int $status
 * @property int|null $offered_by university user who sent request
 * @property int|null $processed_by
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereOfferedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereSponsoredEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $byUser
 * @property-read User|null $processedBy
 * @property-read \App\Models\School\SchoolSponsoredEvent|null $sponsoredEvent
 * @property-read University|null $university
 */
class SchoolSponsoredEventOffer extends Model
{
    use HasFactory;

    protected $fillable = ['sponsored_event_id','university_id','amount','status','offered_by','processed_by','remarks'];

    public function sponsoredEvent(): BelongsTo
    {
        return $this->belongsTo(SchoolSponsoredEvent::class,'sponsored_event_id');
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
    public function byUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'offered_by');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }
}
