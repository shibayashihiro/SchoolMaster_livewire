<?php

namespace App\Models\Suggestions;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Suggestions\SuggestedContact
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $type
 * @property string|null $name
 * @property string|null $website
 * @property string|null $contact_name
 * @property string|null $contact_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuggestedContact whereWebsite($value)
 * @mixin \Eloquent
 */
class SuggestedContact extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','type','name','website','contact_name','contact_email'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
