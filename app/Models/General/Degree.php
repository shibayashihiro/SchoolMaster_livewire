<?php

namespace App\Models\General;

use App\Models\Institutes\UniversityProgram;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Degree
 *
 * @property int $id
 * @property string|null $degree_code
 * @property string|null $degree_name
 * @property string|null $degree_icon
 * @property string|null $degree_image
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
 * @property-read \Illuminate\Database\Eloquent\Collection|UniversityProgram[] $university_programs
 * @property-read int|null $university_programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Degree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree query()
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereDegreeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereDegreeIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereDegreeImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereDegreeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereH2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereH3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereH4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereIconAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereIconTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereImageAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree whereMetaPageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Degree wherePageUrl($value)
 * @mixin \Eloquent
 */
class Degree extends Model
{
    protected $table = 'degrees';

    public $timestamps = false;

    protected $fillable = ['degree_code', 'degree_name', 'degree_icon', 'degree_image', 'h1', 'h2', 'h3', 'h4', 'meta_keywords', 'meta_page_description', 'image_alt_text', 'image_title', 'icon_alt_text', 'icon_title', 'page_url'];

    public function university_programs()
    {
        return $this->hasMany(UniversityProgram::class, 'degree_id', 'id');
    }
}
