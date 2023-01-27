<?php

namespace App\Models\School;

use App\Models\Institutes\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolPointWithdrawalRequest
 *
 * @property int $id
 * @property int $withdrawal_type_id withdrawal type id
 * @property int $by_user who requested to withdraw
 * @property int $school_id
 * @property int|null $bank_account_id
 * @property float $points
 * @property float|null $amount_paid amount paid if its cash out
 * @property int|null $currency_id in what currency we paid
 * @property int $status
 * @property int|null $processed_by
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\School\SchoolPointHistory[] $pointHistories
 * @property-read int|null $point_histories_count
 * @property-read User|null $processedBy
 * @property-read User|null $requestedBy
 * @property-read School|null $school
 * @property-read \App\Models\School\SchoolPointWithdrawalType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereBankAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalRequest whereWithdrawalTypeId($value)
 * @mixin \Eloquent
 */
class SchoolPointWithdrawalRequest extends Model
{
    use HasFactory;

    protected $fillable = ['withdrawal_type_id','by_user','school_id','bank_account_id','points','amount_paid',
        'currency_id','status','processed_by','remarks'];

    /**
     * @return HasMany
     */
    public function pointHistories(): HasMany
    {
        return $this->hasMany(SchoolPointHistory::class,'withdrawal_id');
    }

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }

    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'by_user');
    }

    /**
     * @return BelongsTo
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'processed_by');
    }


    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(SchoolPointWithdrawalType::class,'withdrawal_type_id');
    }

}
