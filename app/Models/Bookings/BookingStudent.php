<?php

namespace App\Models\Bookings;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bookings\BookingStudent
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $representative_id
 * @property string|null $session_start
 * @property string|null $session_end
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read User|null $representative
 * @property-read User|null $student
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereRepresentativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereSessionEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereSessionStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingStudent whereUserId($value)
 * @mixin \Eloquent
 */
class BookingStudent extends Model
{
    protected $table = 'booking_students';

    public $timestamps = false;

    protected $fillable = ['student_id', 'representative_id', 'session_start', 'session_end'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id', 'id');
    }
}
