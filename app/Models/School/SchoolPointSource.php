<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolPointSource
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\School\SchoolPointType[] $schoolPointTypes
 * @property-read int|null $school_point_types_count
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolPointSource extends Model
{
    use HasFactory;

    protected $fillable = ['title','short_description','description'];

    /**
     * @return HasMany
     */
    public function schoolPointTypes(): HasMany
    {
        return $this->hasMany(SchoolPointType::class,'source_id');
    }
}
