<?php

namespace App\Rules;

use App\Helpers\GoogleMapHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidGoogleMapUrl implements ValidationRule
{
    /**
     * ポストされたGoogle Mapの共有リンクが有効か確認
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $googleMapHelper = new GoogleMapHelper();
        $coord = $googleMapHelper->getCoordinatesFromUrl($value);
        if (!isset($coord['lat']) || !isset($coord['lng']) ) {
            $fail(__('validation.valid_google_map_url'));
        }
    }
}
