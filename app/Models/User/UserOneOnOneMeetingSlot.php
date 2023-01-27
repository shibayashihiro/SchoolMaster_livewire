<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\User\UserOneOnOneMeetingSlot
 *
 * @property int $id
 * @property int $user_one_on_one_meeting_id
 * @property string $slot_date
 * @property string $slot_time
 * @property mixed|null $slot_datetime
 * @property int|null $booked_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereBookedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereSlotDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereSlotDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereSlotTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlot whereUserOneOnOneMeetingId($value)
 * @mixin \Eloquent
 * @property-read User|null $bookedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserOneOnOneMeetingSlotBookingRequest[] $bookingRequest
 * @property-read int|null $booking_request_count
 */
class UserOneOnOneMeetingSlot extends Model
{
    use HasFactory;
    protected $fillable = ['user_one_on_one_meeting_id','slot_date','slot_time','slot_datetime','booked_by'];

    public function bookingRequest(): HasMany
    {
        return $this->hasMany(UserOneOnOneMeetingSlotBookingRequest::class,'slot_id');
    }

    public function bookedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'booked_by');
    }
}
