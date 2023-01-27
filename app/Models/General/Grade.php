<?php

namespace App\Models\General;

use App\Models\User\UserBio;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Grade
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|UserBio[] $userBio
 * @property-read int|null $user_bio_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserBio[] $user_bios
 * @property-read int|null $user_bios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereName($value)
 * @mixin \Eloquent
 */
class Grade extends Model
{
    protected $table = 'grades';

    public $timestamps = false;

    protected $fillable = [ 'name', 'description' ];

    public function userBio()
    {
        return $this->hasMany(UserBio::class, 'grade_id', 'id');
    }

}
