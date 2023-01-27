<?php

namespace App\Models\School;

use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolPointType
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property float|null $points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\School\SchoolPointHistory[] $history
 * @property-read int|null $history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $source_id School Point Source Id
 * @property-read \App\Models\School\SchoolPointSource|null $source
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointType whereSourceId($value)
 */
class SchoolPointType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short_description', 'description', 'points','source_id'];

    public function history(): HasMany
    {
        return $this->hasMany(SchoolPointHistory::class, 'school_point_type_id');
    }

    /**
     * @return BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, SchoolPointHistory::class, 'school_point_type_id', 'school_id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(SchoolPointSource::class,'source_id');
    }
}
