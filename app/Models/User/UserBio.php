<?php

namespace App\Models\User;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\Curriculum;
use App\Models\General\FeeRange;
use App\Models\General\Gender;
use App\Models\General\Grade;
use App\Models\General\GradeScale;
use App\Models\General\StudyFunding;
use App\Models\General\StudyLevel;
use App\Models\Institutes\Workshop;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * App\Models\User\UserBio
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $nationality_id
 * @property int|null $gender_id
 * @property int|null $grade_scale_id
 * @property string|null $grades
 * @property string|null $about
 * @property string|null $birthday
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $mobile_country_id
 * @property string|null $mobile
 * @property string|null $address
 * @property int|null $country_id
 * @property int|null $city_id
 * @property string|null $bio_brief
 * @property string|null $profile_photo
 * @property string|null $study_fundings
 * @property string|null $learning_types
 * @property string|null $preferred_programs
 * @property int|null $preferred_destination
 * @property string $privacy_consent
 * @property string $parent_flag
 * @property string|null $planned_year
 * @property string|null $headline
 * @property string|null $position
 * @property string|null $facebook_id
 * @property string|null $linkedin_id
 * @property string|null $work_experience
 * @property string|null $age
 * @property int|null $curriculum_id
 * @property int|null $fee_range_id
 * @property string|null $profile_completion_status
 * @property int|null $study_level_id
 * @property int|null $still_studying
 * @property-read Cities|null $city
 * @property-read Countries|null $country
 * @property-read Curriculum|null $curriculum
 * @property-read FeeRange|null $feeRange
 * @property-read StudyFunding|null $fundingSource
 * @property-read string $mobile_number
 * @property-read GradeScale|null $gradeScale
 * @property-read Countries|null $mobileNumberCountry
 * @property-read StudyLevel|null $studyLevel
 * @property-read \Illuminate\Database\Eloquent\Collection|Workshop[] $workshops
 * @property-read int|null $workshops_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereBioBrief($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereCurriculumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereFacebookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereFeeRangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereGradeScaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereGrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereLearningTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereLinkedinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereMobileCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereParentFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio wherePlannedYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio wherePreferredDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio wherePreferredPrograms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio wherePrivacyConsent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereProfileCompletionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereProfilePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereStillStudying($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereStudyFundings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereStudyLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBio whereWorkExperience($value)
 * @mixin \Eloquent
 */
class UserBio extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nationality_id',
        'gender_id',
        'about',
        'birthday',
        'first_name',
        'last_name',
        'mobile_country_id',
        'mobile',
        'country_id',
        'city_id',
        'bio_brief',
        'profile_photo',
        'gender_id',
        'orcid_id',
        'google_scholar_id',
        'publons_url',
        'research_gate_url',
        'scopus_url',
        'study_fundings',
        'learning_types',
        'preferred_programs',
        'preferred_destination',
        'privacy_consent',
        'parent_flag',
        'position', 'headline', 'work_experience','curriculum_id','fee_range_id', 'grade_scale_id', 'grades','study_level_id','still_studying'
    ];
    protected $guarded = ['photo', 'id'];
    /**
     * Definition: 'active' attribute values
     * Judges completion of a profile
     */
    const PROFILE_INCOMPLETE = 0;
    const PROFILE_COMPLETE = 1;

    /**
     * @return string
     */
    public function getMobileNumberAttribute(): string
    {
        return '+' . $this->mobile_country_id . '' . $this->mobile;
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    /**
     * @return BelongsTo
     */
    public function feeRange(): BelongsTo
    {
        return $this->belongsTo(FeeRange::class,'fee_range_id');
    }

    /**
     * @return BelongsTo
     */
    public function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class,'curriculum_id');
    }
    /**
     * @return BelongsTo
     */
    public function studyLevel(): BelongsTo
    {
        return $this->belongsTo(StudyLevel::class, 'study_level_id');
    }

    /**
     * @return BelongsTo
     */
    public function mobileNumberCountry(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'mobile_country_id', 'country_code');
    }

    public function gradeScale(): BelongsTo
    {
        return $this->belongsTo(GradeScale::class, 'grade_scale_id');
    }

    /**
     * @return BelongsTo
     */
    public function fundingSource(): BelongsTo
    {
        return $this->belongsTo(StudyFunding::class,'study_fundings');
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class, 'speaker_id', 'user_id');
    }
}
