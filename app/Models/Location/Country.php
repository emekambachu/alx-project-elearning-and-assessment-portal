<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'phone_code',
        'country_code',
        'country_name',
        'continent_code',
        'continent_name'
    ];
}
