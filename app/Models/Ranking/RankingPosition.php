<?php

namespace App\Models\Ranking;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Ranking\RankingPosition
 *
 * @property int $id
 * @property int|null $ranking_id
 * @property int|null $university_id
 * @property int|null $world_rank
 * @property int|null $continent_rank
 * @property int|null $country_rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ranking\Ranking|null $ranking
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereContinentRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereCountryRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereRankingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereWorldRank($value)
 * @mixin \Eloquent
 * @property int|null $continent_2_rank
 * @property int|null $continent_3_rank
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereContinent2Rank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RankingPosition whereContinent3Rank($value)
 */
class RankingPosition extends Model
{
    use HasFactory;

    protected $fillable = ['ranking_id','world_rank','continent_rank','country_rank'];
    protected $guarded = ['id'];

//    public function getWorldRankAttribute($value){
//        return addZerosInFrontOfNumber($value,3);
//    }
//
//    public function getContinentRankAttribute($value){
//        return addZerosInFrontOfNumber($value,3);
//    }
//
//    public function getCountryRankAttribute($value){
//        return addZerosInFrontOfNumber($value,3);
//    }

    /**
     * @return BelongsTo
     */
    public function ranking(): BelongsTo
    {
        return $this->belongsTo(Ranking::class,'ranking_id');
    }
}
