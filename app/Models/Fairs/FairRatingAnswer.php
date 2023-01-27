<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Fairs\FairRatingAnswer
 *
 * @property int $id
 * @property int|null $fair_rating_id
 * @property int|null $question_id
 * @property \App\Models\Fairs\FairRating|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\FairRatingQuestion|null $question
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereFairRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRatingAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FairRatingAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['rating_id','question_id','rating'];

    public function rating(): BelongsTo
    {
        return $this->belongsTo(FairRating::class,'rating_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(FairRatingQuestion::class,'question_id');
    }
}
