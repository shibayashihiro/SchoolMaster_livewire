<?php

namespace App\Models\Institutes;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Institutes\InstituteType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InstituteType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InstituteType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InstituteType query()
 * @mixin \Eloquent
 */
class InstituteType extends Model
{
    protected $table = 'institutes_types';

    public $timestamps = false;

    protected $fillable = [ 'type', 'desciption', 'url' ];
}
