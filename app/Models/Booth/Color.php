<?php

namespace App\Models\Booth;

//use App\Events\ColorsChangedEvent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\Color
 *
 * @property int $id
 * @property string|null $color_name
 * @property string|null $color_code
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @mixin \Eloquent
 */
class Color extends Model
{
    protected $table = 'colors';

    /**
     * The event map for the model.
     *
     * @var array
     */
//    protected $dispatchesEvents = [
//        'created' => ColorsChangedEvent::class,
//        'updated' => ColorsChangedEvent::class,
//        'saved'   => ColorsChangedEvent::class,
//        'deleted' => ColorsChangedEvent::class,
//    ];

    public $timestamps = false;

    protected $fillable = ['color_name', 'color_code'];
}
