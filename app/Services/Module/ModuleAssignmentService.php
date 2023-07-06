<?php

namespace App\Services\Module;

use App\Http\Resources\Learning\Course\CourseResourceResource;
use App\Http\Resources\Learning\Module\ModuleAssignmentResource;
use App\Http\Resources\Learning\Module\ModuleAssignmentSubmissionResource;
use App\Models\Learning\Module\ModuleAssignment;
use App\Models\Learning\Module\ModuleAssignmentSubmission;
use App\Services\Base\CrudService;

class ModuleAssignmentService
{
    private string $assignmentSubmissionPath = 'documents/module/assignment';
    public function moduleAssignment(): ModuleAssignment
    {
        return new ModuleAssignment();
    }

    public function moduleAssignmentSubmission(): ModuleAssignmentSubmission
    {
        return new ModuleAssignmentSubmission();
    }

    public function moduleAssignmentSubmissionByUserId($userId, $assignmentId)
    {
        return $this->moduleAssignmentSubmission()->where([
            ['user_id', $userId],
            ['module_assignment_id', $assignmentId],
        ])->first();
    }

    public function assignmentWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssignment()->with('module');
    }

    public function assignmentById($id)
    {
        return $this->assignmentWithRelations()->findOrFail($id);
    }

    public function assignmentsByModuleId($id): \Illuminate\Database\Eloquent\Builder
    {
        return $this->assignmentWithRelations()->where('brace_module_id', $id);
    }

    public function storeAssignment($request): array
    {
        $inputs = $request->all();
        $assignment = $this->moduleAssignment()->create($inputs);
        return [
            'success' => true,
            'assignment' => new ModuleAssignmentResource($assignment)
        ];
    }

    public function updateAssignment($request): array
    {
        $inputs = $request->all();
        $assignment = $this->assignmentById($request->id);
        $assignment->update($inputs);

        return [
            'success' => true,
            'assignment' => new ModuleAssignmentResource($assignment)
        ];
    }

    public function deleteAssignment($request): array
    {
        $assignment = $this->assignmentById($request->id);
        $assignment->delete();

        return [
            'success' => true,
            'message' => 'deleted'
        ];
    }

    public function submitAssignmentByUser($userId, $request): array
    {
        $inputs = $request->all();
        if(empty($inputs['document_one']) && empty($inputs['document_two']) && empty($inputs['document_three'])){
            return [
                'success' => false,
                'submission_error' => 'Please submit at least one document'
            ];
        }

        $inputs['user_id'] = $userId;
        $inputs['document_path'] = $this->assignmentSubmissionPath;
        foreach($inputs as $key => $value){
            if(in_array($key, ['document_one', 'document_two', 'document_three']) && !empty($value)){
                $inputs[$key] = CrudService::uploadAnyFile($request, $this->assignmentSubmissionPath, $key);
            }
        }

        $assignment = $this->moduleAssignmentSubmission()->create($inputs);

        return [
            'success' => true,
            'assignment' => new ModuleAssignmentSubmissionResource($assignment)
        ];
    }
}
