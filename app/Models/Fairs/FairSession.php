<?php

namespace App\Models\Fairs;

use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Fairs\FairSession
 *
 * @property int $id
 * @property int $fair_id
 * @property int|null $university_id
 * @property int $major_id
 * @property int|null $user_id
 * @property mixed|null $start_at
 * @property mixed|null $end_at
 * @property int|null $duration duration in mints
 * @property int|null $hall_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @property-read Major|null $major
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairReserveSessionRequest[] $reservationRequests
 * @property-read int|null $reservation_requests_count
 * @property-read University|null $university
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereHallNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereMajorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairSession whereUserId($value)
 * @mixin \Eloquent
 */
class FairSession extends Model
{
    use HasFactory;

    protected $fillable = ['fair_id', 'university_id', 'major_id', 'user_id', 'start_at', 'end_at', 'duration', 'hall_number'];

    /**
     * @return BelongsTo
     */
    public function fair(): BelongsTo
    {
        return $this->belongsTo(Fair::class, 'fair_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    /**
     * @return BelongsTo
     */
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function reservationRequests(): HasMany
    {
        return $this->hasMany(FairReserveSessionRequest::class,'fair_session_id');
    }
}
