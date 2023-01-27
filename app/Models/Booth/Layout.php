<?php

namespace App\Models\Booth;

use App\Events\LayoutsChangedEvent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\Layout
 *
 * @property int $id
 * @property string|null $layout
 * @property string|null $url
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout query()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereUrl($value)
 * @mixin \Eloquent
 */
class Layout extends Model
{
    protected $table = 'layouts';

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => LayoutsChangedEvent::class,
        'updated' => LayoutsChangedEvent::class,
        'saved'   => LayoutsChangedEvent::class,
        'deleted' => LayoutsChangedEvent::class,
    ];

    public $timestamps = false;

    protected $fillable = ['layout', 'url'];
}
