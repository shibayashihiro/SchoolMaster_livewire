<?php

namespace App\Models\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;

    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $translation = $this->getTranslation($field, \App::getLocale());
            $attributes[$field] = !empty($translation) ? $translation : null ;
        }
        return $attributes;
    }
}
