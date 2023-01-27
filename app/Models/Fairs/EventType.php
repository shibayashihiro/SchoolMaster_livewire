<?php

namespace App\Models\Fairs;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Fairs\EventType
 *
 * @property int $id
 * @property string $name
 * @property array|null $translated_name
 * @property string|null $short_description
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fairs\Fair[] $fairs
 * @property-read int|null $fairs_count
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|EventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventType extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['translated_name'];
    protected $fillable = ['name','translated_name','short_description','description'];

    /**
     * @return HasMany
     */
    public function fairs(): HasMany
    {
        return $this->hasMany(Fair::class,'event_type_id');
    }
}
