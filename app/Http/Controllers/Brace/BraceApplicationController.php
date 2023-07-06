<?php

namespace App\Http\Controllers\Brace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brace\BraceApplicationRequest;
use App\Services\Base\BaseService;
use App\Services\Brace\BraceApplicationService;

class BraceApplicationController extends Controller
{
    protected BraceApplicationService $application;
    public function __construct(
        BraceApplicationService $application
    ){
        $this->application = $application;
    }

    public function create(){
        try {
            return view('home.applications.create');

        } catch (\Exception $e){
            return "Line ".$e->getLine()." of ".$e->getFile().", ".$e->getMessage();
        }
    }

    public function store(BraceApplicationRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->application->storeApplication($request);
            return response()->json($data);

        } catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

}
