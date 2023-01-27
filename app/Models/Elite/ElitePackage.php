<?php

namespace App\Models\Elite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Elite\ElitePackage
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $image
 * @property int|null $duration In Months
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read string $image_url
 * @property string|null $full_image
 * @property-read string $full_image_url
 * @method static \Illuminate\Database\Eloquent\Builder|ElitePackage whereFullImage($value)
 */
class ElitePackage extends Model
{
    use HasFactory;
    protected $fillable=['title','description','duration','image','full_image'];
    protected $guarded=['id'];

    protected $appends = ['image_url','full_image_url'];
    /**
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        return \AppConst::FEATURED . "/" . $this->image;
    }

    /**
     * @return string
     */
    public function getFullImageUrlAttribute(): string
    {
        return \AppConst::FEATURED . "/" . $this->full_image;
    }
}
