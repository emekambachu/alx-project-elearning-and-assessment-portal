<?php

namespace App\Services\Module;

use App\Models\Learning\Module\BraceModule;
use App\Models\Learning\Module\BraceModuleView;
use App\Models\Learning\Module\ModuleAssessmentAnswer;
use App\Models\Learning\Module\ModuleAssessmentQuestion;

class ModuleAssessmentService
{
    protected ModuleService $module;
    public function __construct(ModuleService $module){
        $this->module = $module;
    }

    public function moduleAssessment(): BraceModuleView
    {
        return new BraceModuleView();
    }

    public function moduleAssessmentQuestion(): ModuleAssessmentQuestion
    {
        return new ModuleAssessmentQuestion();
    }

    public function assessmentQuestionsByModuleId($moduleId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessmentQuestion()->with('answer', 'module')
            ->where('brace_module_id', $moduleId);
    }

    public function moduleAssessmentAnswer(): ModuleAssessmentAnswer
    {
        return new ModuleAssessmentAnswer();
    }

    public function assessmentAnswersByModuleId($moduleId, $userId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessmentAnswer()
            ->with('question', 'module', 'user')
            ->where([
                ['brace_module_id', $moduleId],
                ['user_id', $userId],
            ]);
    }

    public function assessmentWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessment()->with('user', 'module');
    }

    public function questionWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessmentQuestion()->with('module');
    }

    public function assessmentById($id): \Illuminate\Database\Eloquent\Builder
    {
        return $this->assessmentWithRelations()->findOrFail($id);
    }

    public function assessmentByModuleId($id): \Illuminate\Database\Eloquent\Builder
    {
        return $this->assessmentWithRelations()->where('brace_module_id', $id)->first();
    }

    public function assessmentCompletionMessages($pass, $retake): string
    {
        $message = '';
        if($pass === 1){
            $message = "Congratulations on passing your assessment, please proceed to the next module";
        }

        if($pass === 0 && $retake <= 3){
            $retakes = 3 - $retake;
            $message = "Sorry, unfortunately you didn't make it. You have {$retakes} retakes, try again or proceed to the next module";
        }

        if($pass === 0 && $retake > 3){
            $message = "Sorry, unfortunately you didn't make it. You have no retakes. Proceed to the next module and try to do better in your next assessment";
        }
        return $message;
    }

    public function storeAnswers($request, $userId, $moduleId): \Illuminate\Http\JsonResponse
    {
        // Store all questions
        foreach($request->inputs as $key => $value){
            $this->moduleAssessmentAnswer()->create([
                'user_id' => $userId,
                'brace_module_id' => $moduleId,
                'module_assessment_question_id' => $value['question_id'],
                'answer' => $value['answer']
            ]);
        }

        $totalQuestions = $this->assessmentQuestionsByModuleId($moduleId)->count();
        $answers = $this->assessmentAnswersByModuleId($moduleId, $userId)->get();

        // If submitted answer is same as correct answer from question relationship increase number of correct answers
        $correctAnswers = 0;
        foreach ($answers as $answer){
            if($answer->answer === $answer->question->correct_answer){
                $correctAnswers ++;
            }
        }

        $percent = ($correctAnswers / $totalQuestions) * 100;

        $submitted = $this->moduleAssessment()->where([
            ['user_id', $userId],
            ['brace_module_id', $moduleId],
            ['status', 1],
        ])->first();

        if(!$submitted){
            if($percent >= 65){
                $submitted = $this->moduleAssessment()->create([
                    'user_id' => $userId,
                    'brace_module_id' => $moduleId,
                    'score' => $correctAnswers,
                    'percent' => $percent,
                    'passed' => 1,
                    'status' => 1,
                ]);

            }else{
                $submitted = $this->moduleAssessment()->create([
                    'user_id' => $userId,
                    'brace_module_id' => $moduleId,
                    'retake' => 1,
                    'score' => $correctAnswers,
                    'percent' => $percent,
                    'passed' => 0,
                    'status' => 1,
                ]);
            }

        }else{
            if($percent >= 65){
                $submitted->score = $correctAnswers;
                $submitted->percent = $percent;
                $submitted->retake += 1;
                $submitted->passed = 1;

            }else{
                if($submitted->retake <= 3){
                    $submitted->score = $correctAnswers;
                    $submitted->percent = $percent;
                    $submitted->retake += 1;
                    $submitted->passed = 0;
                }
            }

            $submitted->save();
        }

        return response()->json([
            'success' => true,
            'passed' => $submitted->percent >= 65,
            'percent' => $submitted->percent,
            'retake' => $submitted->retake,
            'message' => $this->assessmentCompletionMessages($submitted->passed, $submitted->retake)
        ]);
    }

    public function checkUserPassedModule($userId, $moduleId){
        return $this->moduleAssessment()->where([
            ['user_id', $userId],
            ['brace_module_id', $moduleId],
            ['passed', 1],
        ])->first();
    }

    public function clearAllAssessmentAnswers($userId, $moduleId){
        // Check if user passed module
        $passedModule = $this->checkUserPassedModule($userId, $moduleId);
        // If user has not passed module, clear all previous answers before they have another attempt
        // This is because each user has 3 tries
        if(!$passedModule){
            $moduleAssessmentAnswers = $this->assessmentAnswersByModuleId($moduleId, $userId);
            if($moduleAssessmentAnswers->count() > 0){
                $moduleAssessmentAnswers->delete();
            }
        }
    }

    public function getCompletedModulesByUser($userId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->moduleAssessment()->with('module')->where([
            ['user_id', $userId],
            ['status', 1]
        ]);
    }

    public function accumulatedAssessmentScore($userId)
    {
        $assessment = $this->moduleAssessment()->where([
            ['user_id', $userId],
            ['status', 1],
        ]);

        // Get percentage sum and total of completed module assessments
        $sumPercent = $assessment->sum('percent');
        $countCompleted = $assessment->count();
        $countModules = $this->module->braceModule()->count();

        // If total completed module assessment is not equal to total modules,
        // return 0, else calculate the over all module assessment
        if($countCompleted !== $countModules){
            return 0;
        }
        return ($sumPercent / $countModules) * 100;
    }

    public static function accumulatedAssessmentScoreStatic($userId){
        $assessment = BraceModuleView::where([
            ['user_id', $userId],
            ['status', 1],
        ]);
        $module = new BraceModule();

        // Get percentage sum and total of completed module assessments
        $sumPercent = $assessment->sum('percent');
        $countCompleted = $assessment->count();
        $countModules = $module->count();

        // If total completed module assessment is not equal to total modules,
        // return 0, else calculate the over all module assessment
        if($countCompleted !== $countModules){
            return 0;
        }
        return ($sumPercent / $countModules) * 100;
    }

}
