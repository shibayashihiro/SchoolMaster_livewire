<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\AverageCityWeather
 *
 * @property int $id
 * @property int $city_id
 * @property string|null $city_image
 * @property string|null $min_value
 * @property string|null $max_value
 * @property string|null $icon_description
 * @property string|null $icon_alt_text
 * @property string|null $icon_title
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather query()
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereCityImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereIconAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereIconDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereIconTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AverageCityWeather whereMinValue($value)
 * @mixin \Eloquent
 */
class AverageCityWeather extends Model
{
    protected $table = 'average_city_weather';

    public $timestamps = false;

    protected $fillable = ['city_id', 'city_image', 'min_value', 'max_value', 'icon_alt_text', 'icon_title'];
}
