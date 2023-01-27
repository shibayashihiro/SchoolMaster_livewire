<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\University\UniversityLead
 *
 * @property int $id
 * @property int $university_id
 * @property int $student_id
 * @property int|null $event_id
 * @property int $status
 * @property int|null $add_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $notes
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityLead whereNotes($value)
 */
class UniversityLead extends Model
{
    use HasFactory;
}
