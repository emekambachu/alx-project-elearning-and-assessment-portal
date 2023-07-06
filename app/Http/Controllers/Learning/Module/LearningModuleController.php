<?php

namespace App\Http\Controllers\Learning\Module;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\Module\ModuleResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssessmentService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningModuleController extends Controller
{
    protected ModuleService $module;
    public function __construct(ModuleService $module){
        $this->module = $module;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->moduleWithRelations()->orderBy('sort')->get();
            return response()->json([
                'success' => true,
                'count' => $data->count(),
                'modules' => ModuleResource::collection($data),
                'min_module_sort' => $this->module->braceModule()->select('sort')->min('sort'),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->moduleById($request->module_id);
            return response()->json([
                'success' => true,
                'module' => new ModuleResource($data),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }


}
