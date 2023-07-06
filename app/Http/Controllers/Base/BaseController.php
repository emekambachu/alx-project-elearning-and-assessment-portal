<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Services\Base\BaseService;
use App\Services\Location\CountryService;
use Exception;

class BaseController extends Controller
{
    protected CountryService $country;
    public function __construct(CountryService $country){
        $this->country = $country;
    }

    public function getAfricanCountries(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->country->africanCountries()->orderBy('country_name')->get();
            return response()->json([
               'success' => true,
               'countries' => $data,
            ]);

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

}
