<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Skill
 *
 * @property int $id
 * @property string|null $skill
 * @property string|null $icon
 * @property string|null $description
 * @property string|null $url
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUrl($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    protected $table = 'skills';

    public $timestamps = false;

    protected $fillable = ['skill', 'icon', 'description', 'url'];
}
