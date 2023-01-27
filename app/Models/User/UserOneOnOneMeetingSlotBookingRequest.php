<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\User\UserOneOnOneMeetingSlotBookingRequest
 *
 * @property int $id
 * @property int $slot_id
 * @property int $requested_by
 * @property int $status
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereSlotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOneOnOneMeetingSlotBookingRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read User|null $requestedBy
 * @property-read \App\Models\User\UserOneOnOneMeetingSlot|null $slot
 */
class UserOneOnOneMeetingSlotBookingRequest extends Model
{
    use HasFactory;
    protected $fillable = ['slot_id','requested_by','status','remarks'];


    /**
     * @return BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'requested_by');
    }

    /**
     * @return BelongsTo
     */
    public function slot(): BelongsTo
    {
        return $this->belongsTo(UserOneOnOneMeetingSlot::class,'slot_id');
    }
}
