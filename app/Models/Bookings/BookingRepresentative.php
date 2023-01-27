<?php

namespace App\Models\Bookings;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bookings\BookingRepresentative
 *
 * @property int $id
 * @property int $user_id
 * @property int $university_id
 * @property string|null $shift_start
 * @property string|null $shift_end
 * @property string|null $week_days
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereShiftEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereShiftStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingRepresentative whereWeekDays($value)
 * @mixin \Eloquent
 */
class BookingRepresentative extends Model
{
    protected $table = 'booking_representatives';

    public $timestamps = false;

    protected $fillable = ['user_id', 'institute_id', 'campus_id', 'shift_start', 'shift_end', 'week_days'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
