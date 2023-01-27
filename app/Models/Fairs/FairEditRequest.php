<?php

namespace App\Models\Fairs;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Fairs\FairEditRequest
 *
 * @property int $id
 * @property int $fair_id
 * @property array|null $details Data Must Be in Json Format
 * @property int|null $requested_by edited by
 * @property int $status 0:pending, 1:approved, 2:rejected
 * @property string|null $remarks reasons
 * @property int|null $processed_by who approved/reject it
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @property-read \App\Models\Fairs\FairEditHistory|null $fairHistory
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static Builder|FairEditRequest approved()
 * @method static Builder|FairEditRequest pending()
 * @method static Builder|FairEditRequest rejected()
 * @property string|null $event_type
 * @method static Builder|FairEditRequest whereEventType($value)
 */
class FairEditRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fair_id', 'details', 'requested_by', 'status', 'remarks', 'processed_by'
    ];

    protected $casts = ['details' => 'array'];

    /* Edit Request Status*/
    const EDIT_REQUEST_PENDING = 0;
    const EDIT_REQUEST_APPROVED = 1;
    const EDIT_REQUEST_REJECTED = 2;


    public function scopePending(Builder $query)
    {
        return $query->where('status', self::EDIT_REQUEST_PENDING);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::EDIT_REQUEST_APPROVED);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', self::EDIT_REQUEST_REJECTED);
    }

    /**
     * @return bool
     */
    public function approve(): bool
    {
        $this->fairHistory()->create([
            'fair_id' => $this->fair_id,
            'details' => $this->details,
            'operation_type' => FairEditHistory::OPERATION_EDIT,
        ]);
        return $this->update(['status' => self::EDIT_REQUEST_APPROVED, 'processed_by' => \Auth::id()]);
    }

    public function reject(?string $remarks = ''): bool
    {
        $this->fairHistory()->delete();
        return $this->update(['status' => self::EDIT_REQUEST_REJECTED, 'remarks' => $remarks, 'processed_by' => \Auth::id()]);
    }


    /**
     * @return BelongsTo
     */
    public function fair(): BelongsTo
    {
        return $this->belongsTo(Fair::class, 'fair_id');
    }

    public function fairHistory(): HasOne
    {
        return $this->hasOne(FairEditHistory::class, 'fair_id');
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
