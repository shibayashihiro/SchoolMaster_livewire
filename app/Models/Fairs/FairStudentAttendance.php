<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fairs\FairStudentAttendance
 *
 * @property int $id
 * @property int $fair_id
 * @property int $student_id
 * @property int|null $university_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairStudentAttendance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FairStudentAttendance extends Model
{
    use HasFactory;
    protected $fillable = ['fair_id','student_id','university_id'];
}
