<?php

namespace App\Models\Booth;

use App\Events\BoothsChangedEvent;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\Booth
 *
 * @property int $id
 * @property int $schooo_id
 * @property int|null $layout_id
 * @property int|null $color_id
 * @property string|null $composite
 * @property string|null $slug
 * @property int|null $ready
 * @property int|null $position
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|Booth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booth query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereComposite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereSchoooId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booth whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Booth extends Model
{
    protected $table = 'booths';

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => BoothsChangedEvent::class,
        'updated' => BoothsChangedEvent::class,
        'saved'   => BoothsChangedEvent::class,
        'deleted' => BoothsChangedEvent::class,
    ];

    public $timestamps = false;

    protected $fillable = ['institute_id', 'campus_id', 'layout_id', 'color_id', 'composite', 'slug', 'ready', 'position'];

    /**
     * Definition: 'ready' attribute values
     * Judges if booth is published
     */
    const NOT_PUBLISHED = 0;
    const PUBLISHED = 1;

    public function university()
    {
        return $this->belongsTo(University::class, 'campus_id', 'id');
    }
}
