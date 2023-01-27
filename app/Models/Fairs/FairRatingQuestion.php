<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Fairs\FairRatingQuestion
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property float|null $total_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\FairRating|null $ratings
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereTotalPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FairRatingQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'total_points'];

    public function ratings(): BelongsTo
    {
        return $this->belongsTo(FairRating::class, FairRatingAnswer::class, 'question_id', 'fair_rating_id');
    }
}
