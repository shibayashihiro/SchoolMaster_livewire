<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fairs\Statistic
 *
 * @property int $id
 * @property int|null $fair_id
 * @property int|null $user_id
 * @property int|null $booth_id
 * @property int|null $booth_visits
 * @property int|null $audio_calls
 * @property int|null $video_calls
 * @property int|null $chats
 * @property string|null $record_time
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereAudioCalls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereBoothId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereBoothVisits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereChats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereRecordTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereVideoCalls($value)
 * @mixin \Eloquent
 */
class Statistic extends Model
{
    protected $table = 'statistics';

    public $timestamps = false;

    protected $fillable = ['fair_id', 'student_id', 'booth_id', 'booth_visits', 'audio_calls', 'video_calls', 'chats', 'record_time'];
}
