<?php

namespace App\Models\General;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\General\GradeScale
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float|null $scale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale query()
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GradeScale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GradeScale extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','scale'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,User\UserBio::class,'grade_scale_id','user_id');
    }
}
