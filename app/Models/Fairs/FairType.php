<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fairs\FairType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\Fair[] $fairs
 * @property-read int|null $fairs_count
 * @method static \Illuminate\Database\Eloquent\Builder|FairType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairType query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $available
 * @property string|null $fair_type_name
 * @property string|null $slug
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereFairTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairType whereUpdatedAt($value)
 */
class FairType extends Model
{
    protected $table = 'fair_types';

    public $timestamps = false;

    protected $fillable = ['available', 'fair_type_name', 'slug'];

    public function fairs()
    {
        return $this->hasMany(Fair::class, 'type', 'id');
    }
}
