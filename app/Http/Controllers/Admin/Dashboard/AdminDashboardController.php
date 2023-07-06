<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Base\BaseService;
use App\Services\Brace\BraceApplicationService;

class AdminDashboardController extends Controller
{
    protected BraceApplicationService $application;
    public function __construct(
        BraceApplicationService $application
    ){
        $this->application = $application;
    }

    public function getStats(): \Illuminate\Http\JsonResponse
    {
        try {
            $applications = $this->application->braceUser()->count();
            $selectedApplications = $this->application->braceUser()->where('selected', 1)->count();

            return response()->json([
                'success' => true,
                'applications' => $applications,
                'selected_applications' => $selectedApplications,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
