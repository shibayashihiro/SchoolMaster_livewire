<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Any Fair tasks, like sending reminders to universities, should be added to this model.
 *
 * @property int $id
 * @property int|null $reminders_sent
 * @property int|null $fair_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask whereRemindersSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairTask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FairTask extends Model
{
    use HasFactory;

    protected $table = 'fair_tasks';

    protected $fillable = [
        'fair_id',
        'reminders_sent', // for sending reminders to universities
    ];

    public function fair()
    {
        return $this->belongsTo(Fair::class, 'fair_id', 'id');
    }
}
