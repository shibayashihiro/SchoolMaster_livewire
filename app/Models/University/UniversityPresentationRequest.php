<?php

namespace App\Models\University;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityPresentationRequest
 *
 * @property int $id
 * @property int $university_id
 * @property int $school_id
 * @property int $country_id
 * @property int|null $created_by
 * @property int|null $type_id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Cities[] $cities
 * @property-read int|null $cities_count
 * @property-read Countries|null $country
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityPresentationRequestCity[] $requestCities
 * @property-read int|null $request_cities_count
 * @property-read School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityPresentationRequestSlot[] $slots
 * @property-read int|null $slots_count
 * @property-read \App\Models\University\UniversityPresentationRequestType|null $type
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityPresentationRequest extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','school_id','country_id','created_by','type_id','title','description','status'];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(UniversityPresentationRequestType::class,'type_id');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function slots(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequestSlot::class,'request_id');
    }
    public function requestCities(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequestCity::class,'request_id');
    }

    public function cities():BelongsToMany{
        return  $this->belongsToMany(Cities::class, UniversityPresentationRequestCity::class,'request_id','city_id');
    }



}
