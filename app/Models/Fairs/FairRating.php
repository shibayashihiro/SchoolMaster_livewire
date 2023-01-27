<?php

namespace App\Models\Fairs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Fairs\FairRating
 *
 * @property int $id
 * @property int $event_id
 * @property string|null $pros
 * @property string|null $cons
 * @property string|null $comments
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairRatingQuestion[] $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\FairRatingAnswer[] $ratings
 * @property-read int|null $ratings_count
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereCons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating wherePros($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairRating whereUserId($value)
 * @mixin \Eloquent
 */
class FairRating extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','pros','cons','comment','user_id'];

    public function fair(): BelongsTo
    {
        return $this->belongsTo(Fair::class,'event_id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(FairRatingAnswer::class,'fair_rating_id');
    }


    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(FairRatingQuestion::class,FairRating::class,'rating_id','question_id')->withPivot(['rating']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
