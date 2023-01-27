<?php

namespace App\Models\General;

use App\Models\User;
use App\Models\User\StudentStudyFunding;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\StudyFunding
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property int|null $status
 * @property string|null $funding_source
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|StudentStudyFunding[] $studentStudyFundingPivot
 * @property-read int|null $student_study_funding_pivot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereFundingSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $translated_name json data
 * @method static \Illuminate\Database\Eloquent\Builder|StudyFunding whereTranslatedName($value)
 */
class StudyFunding extends Model
{
    protected $table = 'study_fundings';

    public $timestamps = false;

    protected $fillable = ['funding_source'];

    public function studentStudyFundingPivot()
    {
        return $this->hasMany(StudentStudyFunding::class, 'study_funding_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_study_fundings', 'study_funding_id', 'user_id')->using(StudentStudyFunding::class);
    }
}
