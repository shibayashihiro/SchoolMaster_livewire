<?php

namespace App\Models\Booth;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\BoothMenu
 *
 * @property int $id
 * @property int|null $school_id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMenu whereUrl($value)
 * @mixin \Eloquent
 */
class BoothMenu extends Model
{
    protected $table = 'booth_menus';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'campus_id', 'title', 'url'];

    public function university()
    {
        return $this->belongsTo(University::class, 'campus_id', 'id');
    }
}
