<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityEventStudentAttendance
 *
 * @property int $id
 * @property int $university_event_id
 * @property int $student_id
 * @property int|null $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereUniversityEvenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityEventStudentAttendance whereUniversityEventId($value)
 */
class UniversityEventStudentAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['university_event_id','student_id','school_id'];
}
