<?php

namespace App\Models\School;

use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\School\SchoolPointWithdrawalType
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property float|null $min_amount Minimum points user can withdraw
 * @property float|null $max_amount Max points user can withdraw using
 * @property int $bank_account_required Bank account needed to use this withdraw method
 * @property int $cash_out if this type is cash out
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @property-read \App\Models\School\SchoolPointWithdrawalRequest|null $withdrawalRequests
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereBankAccountRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereCashOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointWithdrawalType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolPointWithdrawalType extends Model
{
    use HasFactory;

    protected $fillable = ['title','short_description','description','min_amount','max_amount','bank_account_required',
        'cash_out'];

    //TODO:APPEND ATTRIBUTE FOR IS_CASHOUT

    public function withdrawalRequests(): BelongsTo
    {
        return $this->belongsTo(SchoolPointWithdrawalRequest::class,'withdrawal_type_id');
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class,SchoolPointWithdrawalRequest::class,'withdrawal_type_id','school_id');
    }
}
