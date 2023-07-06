<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use App\Http\Resources\Application\BraceApplicationResource;
use App\Services\Base\BaseService;
use App\Services\Brace\BraceApplicationService;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    protected BraceApplicationService $application;
    public function __construct(BraceApplicationService $application){
        $this->application = $application;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $applications = $this->application->userWithRelations()->latest()->paginate(12);
            $totalSelected = $this->application->braceUser()->where('selected', 1)->count();
            return response()->json([
                'success' => true,
                'applications' => BraceApplicationResource::collection($applications)->response()->getData(true),
                'total' => $applications->total(),
                'total_selected' => $totalSelected
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function select(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->application->selectApplicant($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->application->searchApplications($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function export($form)
    {
        try {
            return $this->application->exportApplications($form);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
