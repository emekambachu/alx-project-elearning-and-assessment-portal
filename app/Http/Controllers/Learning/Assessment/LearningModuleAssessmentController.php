<?php

namespace App\Http\Controllers\Learning\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Learning\SubmitModuleAssessmentRequest;
use App\Http\Resources\Learning\Module\ModuleAssessmentQuestionResource;
use App\Http\Resources\Learning\Module\ModuleResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssessmentQuestionService;
use App\Services\Module\ModuleAssessmentService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningModuleAssessmentController extends Controller
{
    protected ModuleAssessmentQuestionService $question;
    protected ModuleAssessmentService $moduleAssessment;
    protected ModuleService $module;
    public function __construct(
        ModuleAssessmentQuestionService $question,
        ModuleAssessmentService $moduleAssessment,
        ModuleService $module
    ){
        $this->moduleAssessment = $moduleAssessment;
        $this->question = $question;
        $this->module = $module;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $assessment = $this->moduleAssessment->assessmentByModuleId($request->module_id);
            return response()->json([
                'success' => true,
                'assessment' => $assessment,
                'module' => $this->module->moduleById($request->module_id),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function userStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->moduleAssessment->clearAllAssessmentAnswers(Auth::user()->id, $request->module_id);
            $assessment = $this->moduleAssessment->moduleAssessment()->where([
                ['user_id', Auth::user()->id],
                ['brace_module_id', $request->module_id],
            ])->first();

            return response()->json([
                'success' => true,
                'passed' => $assessment && $assessment->passed === 1,
                'retake' => $assessment ? $assessment->retake : 0,
                'status' => $assessment && $assessment->status === 1,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function questions(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            // Get module assessment questions
            $questions = $this->question->questionsByModuleId($request->module_id)->get();
            // Clear all already existing answers
            $this->moduleAssessment->clearAllAssessmentAnswers(Auth::user()->id, $request->module_id);
            $passedModule = $this->moduleAssessment->checkUserPassedModule(Auth::user()->id, $request->module_id);
            return response()->json([
                'success' => true,
                'questions' => ModuleAssessmentQuestionResource::collection($questions),
                'module' => $this->module->moduleById($request->module_id),
                'passed_module' => (bool)$passedModule,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function submitAssessment(SubmitModuleAssessmentRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            return $this->moduleAssessment->storeAnswers($request, Auth::user()->id, $request->module_id);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function moduleAssessmentHistory(): \Illuminate\Http\JsonResponse
    {
        try {
            $completedModuleAssessments = $this->moduleAssessment->getCompletedModulesByUser(Auth::user()->id)
                ->orderBy('id', 'asc')->get();
            $accumulatedAssessmentScore = $this->moduleAssessment->accumulatedAssessmentScore(Auth::user()->id);
            $countModules = $this->module->braceModule()->count();

            return response()->json([
                'success' => true,
                'completed_module_assessments' => $completedModuleAssessments,
                'count_modules' => $countModules,
                'accumulated_assessment_score' => $accumulatedAssessmentScore,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
