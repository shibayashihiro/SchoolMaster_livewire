<?php

namespace App\Models\Fairs;

use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Fairs\FairReserveSessionRequest
 *
 * @property int $id
 * @property int $fair_session_id
 * @property int $university_id
 * @property int $status 0->pending, 1-> accepted by school, 2-> rejected
 * @property int|null $requested_by who requested it
 * @property int|null $processed_by who processed it
 * @property mixed|null $processed_at
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @property-read \App\Models\Fairs\FairSession|null $session
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereFairSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereProcessedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairReserveSessionRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FairReserveSessionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fair_session_id','university_id','status','requested_by','processed_by','processed_at','remarks'
    ];

    /**
     * @return BelongsTo
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(FairSession::class,'fair_session_id');
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
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }


}
