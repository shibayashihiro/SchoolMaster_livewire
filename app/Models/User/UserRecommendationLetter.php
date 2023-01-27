<?php

namespace App\Models\User;

use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\User\UserRecommendationLetter
 *
 * @property int $id
 * @property string $from_name
 * @property string $from_position
 * @property int|null $student_id
 * @property int|null $university_id
 * @property string|null $receiver_email
 * @property string|null $file_path
 * @property int $status
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereFromPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereReceiverEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRecommendationLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read string $file_url
 * @property-read User|null $student
 * @property-read University|null $university
 */
class UserRecommendationLetter extends Model
{
    use HasFactory;

    protected $fillable = ['from_name','from_position','student_id','receiver_email','file_path','status','created_by'];

    protected $appends = ['file_url'];


    public function getFileUrlAttribute(): string
    {
        return \AppConst::CDN_PATH.'/'.$this->file_path;
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class,'student_id');
    }

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id');
    }
}
