<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\AverageLivingCost
 *
 * @property int $id
 * @property int $city_id
 * @property string|null $city_image
 * @property string|null $min_value
 * @property string|null $max_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereCityImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereMinValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageLivingCost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AverageLivingCost extends Model
{
    protected $table = 'average_living_costs';

    protected $fillable = ['min_value', 'max_value', 'city_id'];
}
