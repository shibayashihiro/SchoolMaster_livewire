<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\CountryLanguage
 *
 * @property int $id
 * @property int $country_id
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLanguage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','language_id'];
    protected $guarded = ['id'];
}
