<?php

namespace App\Models\School;

use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolPointCategory
 *
 * @property int $id
 * @property int $country_id
 * @property string $title
 * @property float $rate
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolPointCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolPointCategory extends Model
{
    use HasFactory;
    protected $fillable = ['country_id','title','rate','short_description','description'];

    public function schools(): HasMany
    {
        return $this->hasMany(School::class,'school_category_id');
    }
}
