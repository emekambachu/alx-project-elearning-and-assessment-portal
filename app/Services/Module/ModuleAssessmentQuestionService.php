<?php

namespace App\Services\Module;

use App\Http\Resources\Learning\Module\AdminModuleAssessmentQuestionResource;
use App\Http\Resources\Learning\Module\ModuleAssessmentQuestionResource;
use App\Models\Learning\Module\ModuleAssessmentQuestion;

class ModuleAssessmentQuestionService
{
    public function moduleAssessmentQuestion(): ModuleAssessmentQuestion
    {
        return new ModuleAssessmentQuestion();
    }

    public function moduleAssessmentQuestionWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessmentQuestion()->with('module');
    }

    public function questionById($id)
    {
        return $this->moduleAssessmentQuestionWithRelations()->findOrFail($id);
    }

    public function questionsByModuleId($id): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessmentQuestion()->where('brace_module_id', $id);
    }

    public function storeQuestion($request): array
    {
        $inputs = $request->all();
        $options = [$inputs['option_one'], $inputs['option_two'], $inputs['option_three'], $inputs['option_four'], $inputs['option_five']];

        if(!in_array($inputs['correct_answer'], $options)){
            return [
                'success' => false,
                'submission_error' => 'The correct answer must be part of the options',
            ];
        }

        $question = $this->moduleAssessmentQuestion()->create($inputs);
        return [
            'success' => true,
            'question' => new AdminModuleAssessmentQuestionResource($question)
        ];
    }

    public function updateQuestion($request): array
    {
        $question = $this->questionById($request->id);
        $inputs = $request->all();
        $options = [$inputs['option_one'], $inputs['option_two'], $inputs['option_three'], $inputs['option_four'], $inputs['option_five']];

        if(!in_array($inputs['correct_answer'], $options)){
            return [
                'success' => false,
                'submission_error' => 'The correct answer must be part of the options',
            ];
        }

        $question->update($inputs);

        return [
            'success' => true,
            'question' => new ModuleAssessmentQuestionResource($question)
        ];
    }

    public function deleteQuestion($id): array
    {
        $question = $this->questionById($id);
        $question->delete();

        return [
            'success' => true,
            'message' => 'deleted'
        ];
    }
}
