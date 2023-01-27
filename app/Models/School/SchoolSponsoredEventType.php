<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\School\SchoolSponsoredEventType
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolSponsoredEventType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\School\SchoolSponsoredEvent[] $sponsoredEvent
 * @property-read int|null $sponsored_event_count
 */
class SchoolSponsoredEventType extends Model
{
    use HasFactory;
    protected $fillable = ['title','short_description','description'];
    /**
     * @return HasMany
     */
    public function sponsoredEvent(): HasMany
    {
        return $this->hasMany(SchoolSponsoredEvent::class,'sponsored_event_type_id');
    }
}
