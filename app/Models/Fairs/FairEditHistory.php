<?php

namespace App\Models\Fairs;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Fairs\FairEditHistory
 *
 * @property int $id
 * @property int $fair_id
 * @property int|null $edit_request_id
 * @property int|null $operation_type 1:add,2:edit,3:delete
 * @property array|null $details Data Must Be in Json Format
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Fairs\FairEditRequest|null $editRequest
 * @property-read \App\Models\Fairs\Fair|null $fair
 * @property-read string $operation_name
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereEditRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereFairId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $event_type
 * @method static \Illuminate\Database\Eloquent\Builder|FairEditHistory whereEventType($value)
 */
class FairEditHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'fair_id','details','edit_request_id','operation_type'
    ];

    protected $casts = ['details'=>'array'];

    protected $appends = ['operation_name'];
    /* Operation Type */
    const OPERATION_ADD = 1;
    const OPERATION_EDIT = 2;
    const OPERATION_DELETE = 3;


    public function getOperationNameAttribute(): string
    {
        return $this->operation_type == self::OPERATION_ADD ? 'Created' : 'Updated';
    }
    /**
     * @return BelongsTo
     */
    public function fair(): BelongsTo
    {
        return $this->belongsTo(Fair::class,'fair_id');
    }

    /**
     * @return BelongsTo
     */
    public function editRequest(): BelongsTo
    {
        return $this->belongsTo(FairEditRequest::class,'edit_request_id');
    }

}
