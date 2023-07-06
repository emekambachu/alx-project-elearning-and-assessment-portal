<?php

namespace App\Http\Controllers\Learning\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Learning\SubmitModuleAssignmentRequest;
use App\Http\Resources\Learning\Module\ModuleAssignmentResource;
use App\Http\Resources\Learning\Module\ModuleAssignmentSubmissionResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssignmentService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningModuleAssignmentController extends Controller
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

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $assignment = $this->assignment->assignmentById($request->assignment_id);
            $submittedAssignment = $this->assignment->moduleAssignmentSubmissionByUserId(Auth::user()->id, $request->assignment_id);
            return response()->json([
                'success' => true,
                'assignment' => new ModuleAssignmentResource($assignment),
                'module' => $this->module->moduleById($assignment->brace_module_id),
                'submitted_assignment' => $submittedAssignment ? new ModuleAssignmentSubmissionResource($submittedAssignment) : '',
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(SubmitModuleAssignmentRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->assignment->submitAssignmentByUser(Auth::user()->id, $request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
