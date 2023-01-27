<?php

namespace App\Models\Institutes;

use App\Models\User\UserBag;
use App\Models\User\UserBio;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Institutes\Workshop
 *
 * @property int $id
 * @property int|null $speaker_id
 * @property int|null $campus_id
 * @property string|null $workshop_name
 * @property string|null $workshop_desc
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $workshop_link
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Institutes\University|null $university
 * @property-read \Illuminate\Database\Eloquent\Collection|UserBag[] $userBags
 * @property-read int|null $user_bags_count
 * @property-read UserBio|null $userBio
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereCampusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereSpeakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereWorkshopDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereWorkshopLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereWorkshopName($value)
 * @mixin \Eloquent
 */
class Workshop extends Model
{
    protected $table = 'workshops';

    public $timestamps = false;

    protected $fillable = ['speaker_id', 'campus_id', 'workshop_name', 'workshop_desc', 'start_time', 'end_time', 'workshop_link'];

    public function userBio()
    {
        return $this->belongsTo(UserBio::class, 'speaker_id', 'user_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'campus_id', 'id');
    }

    public function userBags()
    {
        return $this->hasMany(UserBag::class, 'material_id', 'id')
            ->where('type', UserBag::TYPE_WORKSHOP);
    }
}
