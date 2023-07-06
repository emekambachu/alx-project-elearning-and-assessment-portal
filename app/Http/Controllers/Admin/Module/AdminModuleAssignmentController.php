<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\Module\ModuleAssignmentResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssignmentService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminModuleAssignmentController extends Controller
{
    protected ModuleAssignmentService $assignment;
    protected ModuleService $module;
    public function __construct(
        ModuleAssignmentService $assignment,
        ModuleService $module
    ){
        $this->assignment = $assignment;
        $this->module = $module;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $assignments = $this->assignment->assignmentsByModuleId($request->module_id)->get();
            return response()->json([
                'success' => true,
                'assignments' => ModuleAssignmentResource::collection($assignments),
                'module' => $this->module->moduleById($request->module_id),
                'total' => $assignments->count()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->assignment->storeAssignment($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->assignment->assignmentById($request->id);
            return response()->json([
                'success' => true,
                'assignment' => $data,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->assignment->updateAssignment($request);
            return response()->json($data, Response::HTTP_ACCEPTED);

        } catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->assignment->deleteAssignment($request);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
