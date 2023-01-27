<?php

namespace App\Models\User;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\User\UserOneOnOneMeeting
 *
 * @property int $id
 * @property int $host_id who created one on one meeting
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property mixed|null $from_datetime
 * @property mixed|null $to_datetime
 * @property int|null $status
 * @property int|null $country_id
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereFromDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereHostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereToDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeeting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @property-read User|null $host
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserOneOnOneMeetingSlot[] $slots
 * @property-read int|null $slots_count
 */
class UserOneOnOneMeeting extends Model
{
    use HasFactory;

    protected $fillable = ['host_id','title','short_description','description','from_datetime','to_datetime',
        'country_id','city_id','status'];

    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class,'hosted_by');
    }

    public function slots(): HasMany
    {
        return $this->hasMany(UserOneOnOneMeetingSlot::class,'user_one_on_one_meeting_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class,'city_id');
    }
}
