<?php

namespace App\Models;

use App\Models\Fairs\Fair;
use App\Models\Fairs\FairStudentAttendance;
use App\Models\General\Countries;
use App\Models\General\Hobby;
use App\Models\General\Major;
use App\Models\General\StudyLevel;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\Notifications\Notification;
use App\Models\Traits\HasProfilePhoto;
use App\Models\Traits\HasRoles;
use App\Models\University\UniversityEvent;
use App\Models\University\UniversityEventStudentAttendance;
use App\Models\User\Role;
use App\Models\User\UserBio;
use App\Models\User\UserGuardian;
use App\Models\User\UserHobby;
use App\Models\User\UserMajor;
use App\Models\User\UserOneOnOneMeeting;
use App\Models\User\UserOneOnOneMeetingSlot;
use App\Models\User\UserPossibleUniversity;
use App\Models\User\UserPreference;
use App\Models\User\UserRecommendationLetter;
use App\Models\User\UserRole;
use App\Models\User\UserSchool;
use App\Models\User\UserSessionsHistory;
use App\Models\User\UserStudyDestination;
use App\Notifications\User\RestPasswordNotification;
use App\Notifications\User\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $campus_id
 * @property string $name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $facebook_id
 * @property string|null $linkedin_id
 * @property string|null $twitter_id
 * @property string|null $google_id
 * @property string|null $reason_to_delete
 * @property string|null $deleted_at
 * @property string|null $orcid_id
 * @property string|null $approved_at
 * @property string|null $remarks
 * @property int|null $status
 * @property int|null $approved_by
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|UserHobby[] $hobbies
 * @property-read int|null $hobbies_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read UserBio|null $userBio
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCampusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLinkedinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOrcidId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReasonToDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserRole[] $userRoles
 * @property-read int|null $user_roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Major[] $majors
 * @property-read int|null $majors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $preferredUniversities
 * @property-read int|null $preferred_universities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Countries[] $studyDestinations
 * @property-read int|null $study_destinations_count
 * @property int|null $main_user_id sub accounts
 * @property-read User|null $mainAccount
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $subAccounts
 * @property-read int|null $sub_accounts_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMainUserId($value)
 * @property int $register_by_app
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Session[] $activeSessions
 * @property-read int|null $active_sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityEvent[] $attendedUniversityEvents
 * @property-read int|null $attended_university_events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserOneOnOneMeeting[] $bookedOneOnOneMeetings
 * @property-read int|null $booked_one_on_one_meetings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserOneOnOneMeeting[] $hostedOneOnOneMeetings
 * @property-read int|null $hosted_one_on_one_meetings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserRecommendationLetter[] $recommendationLetters
 * @property-read int|null $recommendation_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $schools
 * @property-read int|null $schools_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserSessionsHistory[] $sessionHistory
 * @property-read int|null $session_history_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Notification[] $userNotifications
 * @property-read int|null $user_notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegisterByApp($value)
 * @property-read \App\Models\Institutes\School|null $selected_school
 * @property-read \Illuminate\Database\Eloquent\Collection|Fair[] $attendedFairs
 * @property-read int|null $attended_fairs_count
 * @property-read UserGuardian|null $guardian
 * @property-read \Illuminate\Database\Eloquent\Collection|School[] $pendingSchools
 * @property-read int|null $pending_schools_count
 * @property-read \Illuminate\Database\Eloquent\Collection|StudyLevel[] $studyLevel
 * @property-read int|null $study_level_count
 * @property-read UserPreference|null $preferences
 * @method static \Illuminate\Database\Eloquent\Builder|User selectedSchool()
 * @method static \Illuminate\Database\Eloquent\Builder|User selectedSchoolStudents()
 * @method static \Illuminate\Database\Eloquent\Builder|User students()
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'campus_id',
        'role_id',
        'name',
        'email',
        'password',
        'main_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'selected_school'
    ];

    protected $with = ['school', 'userBio', 'roles'];

    /**
     * @return School|null
     */
    public function getSelectedSchoolAttribute():?School {
        return \Session::get(\AppConst::USER_SCHOOL_KEY);
    }

    function scopeStudents($query)
    {
        return $query->whereRoleId(\AppConst::STUDENT);
    }
    function scopeSelectedSchool($query)
    {
        return $query->whereCampusId(\Auth::user()->selected_school->id);
    }


    function scopeSelectedSchoolStudents($query)
    {
        return $query->Students()->SelectedSchool();
    }

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'campus_id');
    }

    public function userBio(): HasOne
    {
        return $this->hasOne(UserBio::class, 'user_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class, UserHobby::class);
    }

    /**
     * @return BelongsToMany
     */
    public function majors(): BelongsToMany
    {
        return $this->belongsToMany(Major::class, UserMajor::class);
    }

    /**
     * @return BelongsToMany
     */
    public function studyDestinations(): BelongsToMany
    {
        return $this->belongsToMany(Countries::class, UserStudyDestination::class, 'user_id', 'country_id');
    }

    /**
     * @return BelongsToMany
     */
    public function preferredUniversities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, UserPossibleUniversity::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, UserRole::class, 'user_id', 'role_id');
    }

    /**
     * @return HasMany
     */
    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

    public function sendPasswordResetNotification($token)
    {
        if (!empty(config('services.sendgrid.api_key'))) {
            $this->notify(new RestPasswordNotification($token));
            return;
        }
        parent::sendPasswordResetNotification($token);
    }

    public function sendEmailVerificationNotification()
    {
        if (!empty(config('services.sendgrid.api_key'))) {
            $this->notify(new VerifyEmailNotification);
            return;
        }
        parent::sendEmailVerificationNotification();
    }

    /**
     * @return BelongsTo
     */
    public function mainAccount(): BelongsTo
    {
        return $this->belongsTo(User::class,'main_user_id');
    }

    /**
     * @return HasMany
     */
    public function subAccounts(): HasMany
    {
        return $this->hasMany(User::class,'main_user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class,UserSchool::class,'user_id','school_id')
            ->wherePivot('approval_status',\AppConst::APPROVED);
    }

    /**
     * @return BelongsToMany
     */
    public function pendingSchools(): BelongsToMany
    {
        return $this->belongsToMany(School::class,UserSchool::class,'user_id','school_id')
            ->wherePivot('approval_status',\AppConst::PENDING);
    }

    /**
     * @return BelongsToMany
     */
    public function bookedOneOnOneMeetings(): BelongsToMany
    {
        return $this->belongsToMany(UserOneOnOneMeeting::class,UserOneOnOneMeetingSlot::class,'booked_by','user_one_on_one_meeting_id');
    }

    public function hostedOneOnOneMeetings(): HasMany
    {
        return $this->hasMany(UserOneOnOneMeeting::class,'host_id');
    }

    /**
     * @return HasMany
     */
    public function sessionHistory(): HasMany
    {
        return $this->hasMany(UserSessionsHistory::class,'user_id');
    }

    /**
     * @return HasMany
     */
    public function activeSessions(): HasMany
    {
        return $this->hasMany(Session::class,'user_id');
    }

    /**
     * @return HasMany
     */
    public function userNotifications(): HasMany
    {
        return $this->hasMany(Notification::class,'user_id');
    }

    /**
     * @return HasMany
     */
    public function recommendationLetters(): HasMany
    {
        return $this->hasMany(UserRecommendationLetter::class,'student_id');
    }

    /**
     * @return BelongsToMany
     */
    public function attendedFairs(): BelongsToMany
    {
        return $this->belongsToMany(Fair::class,FairStudentAttendance::class,'student_id','fair_id');
    }

    /**
     * @return BelongsToMany
     */
    public function attendedUniversityEvents(): BelongsToMany
    {
        return $this->belongsToMany(UniversityEvent::class,UniversityEventStudentAttendance::class,'student_id','university_event_id');
    }

    public function guardian(): HasOne
    {
        return $this->hasOne(UserGuardian::class,'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function studyLevel(): BelongsToMany
    {
        return $this->belongsToMany(StudyLevel::class, UserBio::class,'user_id','study_level_id');
    }

    /**
     * @return HasOne
     */
    public function preferences(): HasOne
    {
        return $this->hasOne(UserPreference::class,'user_id');
    }
}
