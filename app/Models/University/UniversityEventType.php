<?php

namespace App\Models\University;

use App\Models\Institutes\University;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\University\UniversityEventType
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UniversityEventType newModelQuery()
 * @method static Builder|UniversityEventType newQuery()
 * @method static Builder|UniversityEventType query()
 * @method static Builder|UniversityEventType whereCreatedAt($value)
 * @method static Builder|UniversityEventType whereDescription($value)
 * @method static Builder|UniversityEventType whereId($value)
 * @method static Builder|UniversityEventType whereShortDescription($value)
 * @method static Builder|UniversityEventType whereTitle($value)
 * @method static Builder|UniversityEventType whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityEvent[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $universities
 * @property-read int|null $universities_count
 */
class UniversityEventType extends Model
{
    use HasFactory;

    protected $fillable = ['title','short_description','description','template'];

    /**
     * @return HasMany
     */
    public function events(): HasMany
    {
        return $this->hasMany(UniversityEvent::class,'university_event_type_id');
    }


    /**
     * @return BelongsToMany
     */
    public function universities(): BelongsToMany
    {
        return $this->belongsToMany(University::class,UniversityEvent::class,'university_event_type_id','university_id');
    }
}
