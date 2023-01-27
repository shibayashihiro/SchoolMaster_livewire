<?php

namespace App\Models\Booth;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\BoothGraphics
 *
 * @property int $id
 * @property int|null $school_id
 * @property string|null $logo
 * @property string|null $banner1
 * @property string|null $banner2
 * @property string|null $banner3
 * @property string|null $banner4
 * @property string|null $banner5
 * @property string|null $banner6
 * @property string|null $banner7
 * @property string|null $banner8
 * @property string|null $banner9
 * @property string|null $tvscreen
 * @property string|null $tvsplash
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereBanner9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereTvscreen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereTvsplash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothGraphics whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BoothGraphics extends Model
{
    protected $table = 'booth_graphics';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'campus_id', 'logo', 'banner1', 'banner2', 'banner3', 'banner4', 'banner5', 'banner6', 'banner7', 'banner8', 'banner9', 'tvscreen', 'tvsplash'];

    /**
     * Definition: Number to Position Column relation array
     */
    const POSITION = [
        '1' => 'banner1',
        '2' => 'banner2',
        '3' => 'banner3',
        '4' => 'banner4',
        '5' => 'logo',
    ];

    public function university()
    {
        return $this->belongsTo(University::class, 'campus_id', 'id');
    }
}
