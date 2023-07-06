<?php

namespace App\Services\Location;

use App\Models\Location\Country;

class CountryService
{
    public function country(): Country
    {
        return new Country();
    }

    public function countryById($id){
        return $this->country()->findOrFail($id);
    }

    public function africanCountries(){
        return $this->country()->where('continent_name', '=', 'Africa');
    }
}
