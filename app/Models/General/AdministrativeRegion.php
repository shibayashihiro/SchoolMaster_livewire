<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\AdministrativeRegion
 *
 * @property int $id
 * @property int|null $country_id
 * @property string|null $name
 * @property string|null $local_name
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $sasa
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereSasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdministrativeRegion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdministrativeRegion extends Model
{
    protected $table = 'administrative_regions';

    public $timestamps = false;

    protected $fillable = ['country_id', 'name', 'local_name', 'longitude', 'latitude', 'sasa'];
}
