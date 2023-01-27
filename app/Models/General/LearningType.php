<?php

namespace App\Models\General;

use App\Models\User;
use App\Models\User\StudentLearningType;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\LearningType
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|StudentLearningType[] $studentLearningTypesPivot
 * @property-read int|null $student_learning_types_pivot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|LearningType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LearningType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LearningType whereName($value)
 * @mixin \Eloquent
 */
class LearningType extends Model
{
    protected $table = 'learning_types';

    public $timestamps = false;

    protected $fillable = ['learning_type'];

    public function studentLearningTypesPivot()
    {
        return $this->hasMany(StudentLearningType::class, 'learning_type_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_learning_types', 'learning_type_id', 'user_id')->using(StudentLearningType::class);
    }
}
