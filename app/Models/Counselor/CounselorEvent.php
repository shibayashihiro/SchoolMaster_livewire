<?php

namespace App\Models\Counselor;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * App\Models\Counselor\CounselorEvent
 *
 * @property int $id
 * @property int $counselor_event_type_id
 * @property string $title
 * @property string|null $image
 * @property string|null $url
 * @property string|null $location
 * @property int|null $country_id
 * @property int|null $city_id
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $fee
 * @property string|null $start_datetime
 * @property string|null $end_datetime
 * @property string|null $source
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @property-read User|null $createdBy
 * @property-read \App\Models\Counselor\CounselorEventType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereCounselorEventTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CounselorEvent whereUrl($value)
 * @mixin \Eloquent
 */
class CounselorEvent extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['counselor_event_type_id','title','description','short_description','image','url','location',
        'country_id','city_id','fee','start_datetime','end_datetime','source','create_by'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CounselorEventType::class,'counselor_event_type_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
}
