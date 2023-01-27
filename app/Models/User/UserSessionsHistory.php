<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserSessionsHistory
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $country
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property int|null $session_id
 * @property mixed|null $ended_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSessionsHistory whereUserId($value)
 * @mixin \Eloquent
 */
class UserSessionsHistory extends Model
{
    use HasFactory;
}
