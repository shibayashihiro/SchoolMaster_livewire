<?php

namespace App\Models\Elite;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Elite\EliteUniversity
 *
 * @property int $id
 * @property int $university_id
 * @property int $elite_package_id
 * @property int $status
 * @property string|null $start_from
 * @property string|null $valid_till
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Elite\ElitePackage $package
 * @property-read University $university
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity query()
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereElitePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereStartFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EliteUniversity whereValidTill($value)
 * @mixin \Eloquent
 * @method static Builder|EliteUniversity active()
 * @method static Builder|EliteUniversity expired()
 */
class EliteUniversity extends Model
{
    use HasFactory;
    protected $fillable = ['university_id','elite_package_id','status','start_from','valid_till'];
    protected $guarded =['id'];

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(ElitePackage::class,'elite_package_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', \AppConst::ACTIVE_FEATURED);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('status', \AppConst::EXPIRED_FEATURED);
    }
}
