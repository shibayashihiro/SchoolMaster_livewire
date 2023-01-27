<?php

namespace App\Models\Institutes;

use App\Models\Fairs\Fair;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Institutes\Institute
 *
 * @property int $id
 * @property int $institute_type_id
 * @property int $no_campuses Number of Campuses
 * @property int $main_campus_id
 * @property string $slug
 * @property string $institute_name
 * @property string|null $short_name abbreviation
 * @property string|null $description
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address1
 * @property string|null $address2
 * @property int|null $country_id
 * @property int|null $city_id
 * @property string|null $website
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $map_link
 * @property string $logo
 * @property string|null $monogram
 * @property string $logo_description
 * @property string|null $main_banner
 * @property string|null $banner_description
 * @property string|null $page_url
 * @property string|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection|Fair[] $fairs
 * @property-read int|null $fairs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Institutes\University[] $universities
 * @property-read int|null $universities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Institute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereBannerDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereInstituteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereInstituteTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereLogoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereMainBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereMainCampusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereMonogram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereNoCampuses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute wherePageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereWebsite($value)
 * @mixin \Eloquent
 */
class Institute extends Model
{
    protected $table = 'institutes';

    public $timestamps = false;

    protected $fillable = ['campuses', 'main_campus_id', 'type', 'institute_name', 'about', 'logo', 'logo_description', 'main_banner', 'banner_description', 'slug'];

    /**
     * Definition: 'type' attribute values
     */
    const TYPE_UNIVERSITY             = 1;
    const TYPE_SCHOOL                 = 2;
    const TYPE_EMBASSY                = 3;
    const TYPE_EDUCATION_AGENCY       = 4;
    const TYPE_TRAINING_CENTER        = 5;
    const TYPE_SCHOLARSHIPS_PROVIDER  = 6;

    public function fairs()
    {
        return $this->hasMany(Fair::class, 'institute_id', 'id');
    }

    public function universities()
    {
        return $this->hasMany(University::class, 'institute_id', 'id');
    }

    /**
     * Mutator & Accessors
     */

    public function getLogoAttribute($value)
    {
        return $value ?? \AppConstants::INSTITUTE_LOGO_PLACEHOLDER;
    }
}
