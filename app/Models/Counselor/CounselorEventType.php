<?php

namespace App\Models\Counselor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Counselor\CounselorEventType
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Counselor\CounselorEvent[] $counselorEvents
 * @property-read int|null $counselor_events_count
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEventType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CounselorEventType extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','short_description'];

    /**
     * @return HasMany
     */
    public function counselorEvents(): HasMany
    {
        return $this->hasMany(CounselorEvent::class,'counselor_event_type_id');
    }

}
