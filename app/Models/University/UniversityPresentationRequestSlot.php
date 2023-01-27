<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\University\UniversityPresentationRequestSlot
 *
 * @property int $id
 * @property int $request_id
 * @property mixed $start_datetime
 * @property string|null $duration
 * @property int $status
 * @property int|null $reserved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\University\UniversityPresentationRequest|null $presentationRequest
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereReservedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UniversityPresentationRequestSlot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UniversityPresentationRequestSlot extends Model
{
    use HasFactory;

    protected $fillable = ['request_id','start_datetime','duration','status','reserved_by'];

    public function presentationRequest(): BelongsTo
    {
     return $this->belongsTo(UniversityPresentationRequest::class,'request_id');
    }
}
