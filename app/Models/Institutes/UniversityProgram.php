<?php

namespace App\Models\Institutes;

use App\Models\General\Degree;
use App\Models\General\Program;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Institutes\UniversityProgram
 *
 * @property-read Degree|null $degree
 * @property-read Degree|null $degrees
 * @property-read Program|null $program
 * @property-read Program|null $programs
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityProgram query()
 * @mixin \Eloquent
 */
class UniversityProgram extends Model
{
    protected $table = 'university_programs';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'campus_id', 'degree_id', 'program_id'];

    // to be removed
    public function programs()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    // to be removed
    public function degrees()
    {
        return $this->belongsTo(Degree::class, 'degree_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id', 'id');
    }
}
