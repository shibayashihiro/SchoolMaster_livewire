<?php

namespace App\Models\Booth;

use App\Models\User\UserBag;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booth\BoothMaterial
 *
 * @property int $id
 * @property int|null $school_id
 * @property string|null $title
 * @property int|null $file_type
 * @property string|null $url
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read UserBag|null $userBag
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoothMaterial whereUrl($value)
 * @mixin \Eloquent
 */
class BoothMaterial extends Model
{
    protected $table = 'booth_materials';

    public $timestamps = false;

    protected $fillable = ['institute_id', 'campus_id', 'title', 'file_type', 'url'];

    /**
     * Definition: 'file_type' attribute values
     */
    const FILETYPE_DOCUMENT = 1;
    const FILETYPE_VIDEO = 2;

    public function userBag()
    {
        return $this->hasOne(UserBag::class, 'material_id', 'id');
    }
}
