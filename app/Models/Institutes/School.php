<?php

namespace App\Models\Institutes;

use App\Models\Fairs\Fair;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\CountryState;
use App\Models\General\Gender;
use App\Models\School\SchoolPointCategory;
use App\Models\School\SchoolPointHistory;
use App\Models\School\SchoolPointType;
use App\Models\School\SchoolPointWithdrawalRequest;
use App\Models\School\SchoolPointWithdrawalType;
use App\Models\School\SchoolSponsoredEvent;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityEventInvitation;
use App\Models\University\UniversityPresentationRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Institutes\School
 *
 * @property int $id
 * @property int $institute_id
 * @property string|null $school_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address1
 * @property string|null $address2
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $school_type_id
 * @property string|null $website
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $about_us
 * @property int|null $number_students
 * @property int|null $number_grade11
 * @property int|null $number_grade12
 * @property int|null $number_teachers
 * @property string|null $curriculum_id
 * @property string|null $fees_grade11
 * @property string|null $fees_grade12
 * @property string|null $grade_13
 * @property string|null $grade_13_fee
 * @property string|null $facebook_url
 * @property string|null $linkedin_url
 * @property string|null $map_link
 * @property int|null $status
 * @property int|null $moderator_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $logo
 * @property int|null $gender_id
 * @property string|null $translated_name json data
 * @property-read User|null $admin
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|Fair[] $fairs
 * @property-read int|null $fairs_count
 * @property-read Gender|null $gender
 * @property-read string $logo_url
 * @property-read \App\Models\Institutes\Institute|null $institutes
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|School query()
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereCurriculumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFeesGrade11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereFeesGrade12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGrade13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereGrade13Fee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLinkedinUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereModeratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberGrade11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberGrade12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereNumberTeachers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereWebsite($value)
 * @mixin \Eloquent
 * @property string|null $sm_link
 * @property float|null $sm_credit
 * @property int|null $school_category_id School Point Category
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $counselors
 * @property-read int|null $counselors_count
 * @property-read SchoolPointCategory|null $pointCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolPointType[] $pointTypes
 * @property-read int|null $point_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolPointHistory[] $pointsHistory
 * @property-read int|null $points_history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolSponsoredEvent[] $sponsoredEvents
 * @property-read int|null $sponsored_events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $universityEvents
 * @property-read int|null $university_events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolPointWithdrawalType[] $withdrawalTypes
 * @property-read int|null $withdrawal_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|SchoolPointWithdrawalRequest[] $withdrawals
 * @property-read int|null $withdrawals_count
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSchoolCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSmCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|School whereSmLink($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $schoolAdmins
 * @property-read int|null $school_admins_count
 * @property-read CountryState|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityPresentationRequest[] $presentationRequests
 * @property-read int|null $presentation_requests_count
 */
class School extends Model
{
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $table = 'schools';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'gender_id' ,'logo', 'school_name', 'email', 'phone', 'address1', 'address2',
        'country_id', 'city_id','state_id', 'website', 'latitude', 'longitude', 'about_us', 'number_students', 'number_grade11',
        'number_grade12', 'number_teachers', 'curriculum_id', 'fees_grade11', 'fees_grade12', 'map_link', 'campus',
        'status', 'moderator_id'];

    protected $appends = ['logo_url'];

    const CURRICULUMS = ["American", "British", "Canadian", "CBSE", 'National', "Russian", "SABIS", "UK/BTEC", "UK/IB", "US/IB"];

    const FEE_RANGES = [
        'ae' => ["Free", "> 20,000 AED", "21,000 - 30,000 AED", "31,000 - 45,000 AED", "46,000 - 60,000 AED",
            "61,000 - 75,000 AED", "> 75,000 AED"],
        'jo' => ["Free","> 1,000 JD","1,000 - 3,000 JD","3,000 - 5,000 JD",
            "5,000 - 10,000 JD","> 10,000 JD"],
        'tr' => ["Free","20.000 TL <","20,000 - 40,000 TL","40,000-60,000 TL",
            "60,000-80,000 TL","80,000-100,000 TL","> 100,000 TL >"],
    ];

    /**
     * @param $value
     * @return string|null
     */
    public function getLogoAttribute($value): ?string
    {
        return ($value == "NULL" ? null : $value);
    }


    public function logoUrl(): Attribute
    {
        return new Attribute(get:fn()=>\AppConst::SCHOOL_LOGOS . "/" . ($this->logo ?? "default_color.png"));
    }

    public function institutes()
    {
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function fairs()
    {
        return $this->hasMany(Fair::class, 'school_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'campus_id', 'id');
    }

//    public function cities()
//    {
//        return $this->belongsTo(City::class, 'city_id', 'id');
//    }
//
//    public function countries()
//    {
//        return $this->belongsTo(Country::class, 'country_id', 'id');
//    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(CountryState::class,'state_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::SCHOOL_ADMINISTRATOR);
    }

    /**
     * @return BelongsToMany
     */
    public function schoolAdmins(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserSchool::class,'school_id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }


    /**
     * @return BelongsToMany
     */
    public function counselors(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserSchool::class,'school_id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function pointCategory(): BelongsTo
    {
        return $this->belongsTo(SchoolPointCategory::class,'school_category_id');
    }

    /**
     * @return HasMany
     */
    public function pointsHistory(): HasMany
    {
        return $this->hasMany(SchoolPointHistory::class,'school_id');
    }

    /**
     * @return BelongsToMany
     */
    public function pointTypes(): BelongsToMany
    {
        return $this->belongsToMany(SchoolPointType::class,SchoolPointHistory::class,'school_id','school_category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function withdrawalTypes(): BelongsToMany
    {
        return $this->belongsToMany(SchoolPointWithdrawalType::class,SchoolPointWithdrawalRequest::class,'school_id','withdrawal_type_id');
    }

    /**
     * @return HasMany
     */
    public function withdrawals(): HasMany
    {
        return $this->hasMany(SchoolPointWithdrawalRequest::class,'school_id');
    }

    /**
     * @return BelongsToMany
     */
    public function universityEvents(): BelongsToMany
    {
        return $this->belongsToMany(UniversityEvent::class,UniversityEventInvitation::class,'school_id','university_event_id');
    }

    /**
     * @return HasMany
     */
    public function sponsoredEvents(): HasMany
    {
        return $this->hasMany(SchoolSponsoredEvent::class,'school_id');
    }

    public function presentationRequests(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequest::class,'school_id');
    }
}
