<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Continents
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $map
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Countries[] $countries
 * @property-read int|null $countries_count
 * @method static \Illuminate\Database\Eloquent\Builder|Continents newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continents newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continents query()
 * @method static \Illuminate\Database\Eloquent\Builder|Continents whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continents whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continents whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continents whereName($value)
 * @mixin \Eloquent
 */
class Continents extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
        'map'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Countries::class, 'continent_id_1')->orderBy('country_name','ASC');
    }
}
