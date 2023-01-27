<?php

namespace App\Models\Booth;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\HallBanner
 *
 * @property int $id
 * @property int|null $vfair_id
 * @property int|null $position
 * @property string|null $url
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HallBanner whereVfairId($value)
 * @mixin \Eloquent
 */
class HallBanner extends Model
{
    protected $table = 'hall_banners';

    public $timestamps = false;

    protected $fillable = ['vfair_id', 'position', 'url'];
}
