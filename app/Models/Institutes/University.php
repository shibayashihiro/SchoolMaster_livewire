<?php

namespace App\Models\Institutes;

use App\Models\Bookings\BookingRepresentative;
use App\Models\Booth\Booth;
use App\Models\Booth\BoothGraphics;
use App\Models\Booth\BoothMaterial;
use App\Models\Booth\BoothMenu;
use App\Models\Committee\CommitteeAccount;
use App\Models\Elite\ElitePackage;
use App\Models\Elite\EliteUniversity;
use App\Models\Fairs\FairCredit;
use App\Models\Fairs\Invitation;
use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\Ranking\RankingPosition;
use App\Models\Traits\HasTranslations;
use App\Models\University\UniversityLead;
use App\Models\University\UniversityPresentationRequest;
use App\Models\University\UniversityStatus;
use App\Models\User;
use App\Models\User\UserPossibleUniversity;
use App\Models\User\UserRecommendationLetter;
use App\Models\User\WebinarCredential;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Institutes\University
 *
 * @property int $id
 * @property int $institute_id
 * @property string $slug
 * @property string|null $university_name
 * @property string|null $short_name
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
 * @property int|null $status
 * @property string|null $admission_contact
 * @property string|null $admission_email
 * @property int|null $moderator_id
 * @property float|null $acceptance_rate
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $monogram
 * @property string|null $translated_name
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read User|null $admin
 * @property-read \Illuminate\Database\Eloquent\Collection|BookingRepresentative[] $bookingRepresentatives
 * @property-read int|null $booking_representatives_count
 * @property-read Booth|null $booth
 * @property-read BoothGraphics|null $boothGraphics
 * @property-read \Illuminate\Database\Eloquent\Collection|BoothMaterial[] $boothMaterials
 * @property-read int|null $booth_materials_count
 * @property-read \Illuminate\Database\Eloquent\Collection|BoothMenu[] $boothMenus
 * @property-read int|null $booth_menus_count
 * @property-read FairCredit|null $credits
 * @property-read \Illuminate\Database\Eloquent\Collection|BoothMaterial[] $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Institutes\Institute|null $institute
 * @property-read \App\Models\Institutes\Institute|null $institutes
 * @property-read \Illuminate\Database\Eloquent\Collection|Invitation[] $invitations
 * @property-read int|null $invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $representatives
 * @property-read int|null $representatives_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Institutes\UniversityProgram[] $universityPrograms
 * @property-read int|null $university_programs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|BoothMaterial[] $videos
 * @property-read int|null $videos_count
 * @property-read WebinarCredential|null $webinarCredentials
 * @method static \Illuminate\Database\Eloquent\Builder|University newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University query()
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAcceptanceRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereAdmissionEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereModeratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereMonogram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereWebsite($value)
 * @mixin \Eloquent
 * @property-read string $logo_url
 * @property-read RankingPosition|null $rankingPositions
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @method static \Illuminate\Database\Query\Builder|University onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|University withTrashed()
 * @method static \Illuminate\Database\Query\Builder|University withoutTrashed()
 * @property-read EliteUniversity|null $elite
 * @property-read \Illuminate\Database\Eloquent\Collection|ElitePackage[] $elitePackages
 * @property-read int|null $elite_packages_count
 * @property-read UniversityStatus|null $universityStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserRecommendationLetter[] $studentRecommendationLetters
 * @property-read int|null $student_recommendation_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityPresentationRequest[] $presentationRequests
 * @property-read int|null $presentation_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $studentLeads
 * @property-read int|null $student_leads_count
 */
class University extends Model
{

    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['translated_name'];

    protected $table = 'universities';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'university_name', 'email', 'phone', 'address1', 'address2', 'country_id', 'city_id', 'website', 'latitude', 'longitude', 'map_link', 'status', 'moderator_id'];

    protected $appends = ['logo_url'];


    /**
     * @param $value
     * @return string|null
     */
    public function getLogoAttribute($value): ?string
    {
        return ($value == "NULL" ? null : $value);
    }

    /**
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        return \AppConst::UNI_LOGOS . "/" . ($this->logo ?? "default_color.png");
    }


    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'campus_id', 'id');
    }

    // to be removed
    public function institutes()
    {
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::UNIVERSITY_ADMINISTRATOR);
    }

    public function representatives()
    {
        return $this->hasMany(User::class, 'campus_id', 'id');
        // ->where('role_id', \AppConstants::UNIVERSITY_REPRESENTATIVE);
    }


    /**
     * @return HasOne
     */
    public function rankingPositions(): HasOne
    {
        return $this->hasOne(RankingPosition::class, 'university_id')->latest();
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

    /**
     * @return HasOne
     */
    public function elite(): HasOne
    {
        return $this->hasOne(EliteUniversity::class)->where('status', 1)->latest();
    }

    public function elitePackages(){
        return $this->belongsToMany(ElitePackage::class,EliteUniversity::class);
    }


    /**
     * @return BelongsTo
     */
    public function universityStatus(): BelongsTo
    {
        return $this->belongsTo(UniversityStatus::class,'status');
    }


    /**
     * @return HasMany
     */
    public function studentRecommendationLetters(): HasMany
    {
        return $this->hasMany(UserRecommendationLetter::class,'university_id');
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserPossibleUniversity::class);
    }

    public function presentationRequests(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequest::class,'university_id');
    }

    public function leads(): HasMany
    {
        return $this->hasMany(UniversityLead::class,'university_id');
    }
    public function studentLeads(): BelongsToMany
    {
        return $this->belongsToMany(User::class,UniversityLead::class,'university_id','student_id');
    }
    public function invitation(): HasMany
    {
        return $this->hasMany(Invitation::class, 'university_id');
    }
}
