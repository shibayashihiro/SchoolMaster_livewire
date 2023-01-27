<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\SocialMedia
 *
 * @property int $id
 * @property string|null $social_media
 * @property string|null $logo
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereSocialMedia($value)
 * @mixin \Eloquent
 */
class SocialMedia extends Model
{
    protected $table = 'social_media';

    public $timestamps = false;

    protected $fillable = ['social_media', 'logo'];
}
