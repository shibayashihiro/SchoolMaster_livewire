<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\WorldCities
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $division_id
 * @property string|null $name
 * @property string|null $full_name
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorldCities whereName($value)
 * @mixin \Eloquent
 */
class WorldCities extends Model
{
    use HasFactory;
}
