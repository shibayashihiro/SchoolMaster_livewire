<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Gender
 *
 * @property int $id
 * @property string|null $gender
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereId($value)
 * @mixin \Eloquent
 */
class Gender extends Model
{
    protected $table = 'genders';

    public $timestamps = false;

    protected $fillable = ['gender'];
}
