<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\University\UniversityPresentationRequestType
 *
 * @property int $id
 * @property string $title
 * @property string|null $sort_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\University\UniversityPresentationRequest[] $presentationRequests
 * @property-read int|null $presentation_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereSortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityPresentationRequestType extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','short_description'];

    public function presentationRequests(): HasMany
    {
        return $this->hasMany(UniversityPresentationRequest::class,'type_id');
    }
}
