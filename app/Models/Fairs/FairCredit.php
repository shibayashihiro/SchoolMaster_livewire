<?php

namespace App\Models\Fairs;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fairs\FairCredit
 *
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|FairCredit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairCredit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairCredit query()
 * @mixin \Eloquent
 */
class FairCredit extends Model
{
    use HasFactory;

    protected $fillable = ['credits', 'university_id'];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }
}
