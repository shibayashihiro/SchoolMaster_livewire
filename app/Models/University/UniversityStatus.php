<?php

namespace App\Models\University;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityStatus
 *
 * @property int $id
 * @property string $title
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $color text color i.e #00aeef
 * @property bool $show_rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $text_color
 * @property-read \Illuminate\Database\Eloquent\Collection|University[] $universities
 * @property-read int|null $universities_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereShowRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityStatus extends Model
{
    use HasFactory;

    protected $fillable = ['title','short_description','description','color','show_rank'];

    protected  $guarded = ['id','text_color'];

    protected $casts = ['show_rank'=>'boolean'];

    protected $appends  = ['text_color'];

    public function getTextColorAttribute(){
        return $this->color ?? '#001736';
    }

    /**
     * @return HasMany
     */
    public function universities(): HasMany
    {
        return $this->hasMany(University::class,'status');
    }
}
