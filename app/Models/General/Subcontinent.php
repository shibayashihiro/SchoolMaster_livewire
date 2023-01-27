<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Subcontinent
 *
 * @property int $id
 * @property int|null $continent_id
 * @property string|null $name
 * @property string|null $map
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent whereContinentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcontinent whereName($value)
 * @mixin \Eloquent
 */
class Subcontinent extends Model
{
    protected $table = 'subcontinents';

    public $timestamps = false;

    protected $fillable = ['continent_id', 'name', 'map'];
}
