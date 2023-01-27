<?php

namespace App\Models\General;

use App\Models\Institutes\UniversityProgram;
use App\Models\User;
use App\Models\User\StudentProgram;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Program
 *
 * @property int $id
 * @property int|null $faculty_id
 * @property int $program_category_id
 * @property string|null $program_name
 * @property string $program_icon
 * @property string|null $program_image
 * @property int|null $program_code
 * @property string|null $h1
 * @property string|null $h2
 * @property string|null $h3
 * @property string|null $h4
 * @property string|null $meta_keywords
 * @property string|null $meta_page_description
 * @property string|null $image_alt_text
 * @property string|null $image_title
 * @property string|null $icon_alt_text
 * @property string|null $icon_title
 * @property string|null $page_url
 * @property-read \Illuminate\Database\Eloquent\Collection|StudentProgram[] $studentProgramsPivot
 * @property-read int|null $student_programs_pivot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityProgram[] $university_programs
 * @property-read int|null $university_programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereH2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereH3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereH4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereIconAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereIconTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereImageAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereMetaPageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program wherePageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereProgramCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereProgramCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereProgramIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereProgramImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereProgramName($value)
 * @mixin \Eloquent
 */
class Program extends Model
{
    protected $table = 'programs';

    public $timestamps = false;

    protected $fillable = ['program_name', 'program_icon', 'faculty_id', 'program_code', 'program_image', 'h1', 'h2', 'h3', 'h4', 'meta_keywords', 'meta_page_description', 'image_alt_text', 'image_title', 'icon_alt_text', 'icon_title', 'page_url'];

    public function university_programs()
    {
        return $this->hasMany(UniversityProgram::class, 'program_id', 'id');
    }

    public function studentProgramsPivot()
    {
        return $this->hasMany(StudentProgram::class, 'program_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_programs', 'program_id', 'user_id')->using(StudentProgram::class);
    }

    /**
     * Mutator & Accessors
     */
    public function getProgramIconAttribute($value)
    {
        return $value ?? \AppConstants::PROGRAM_ICON_PLACEHOLDER;
    }
}
