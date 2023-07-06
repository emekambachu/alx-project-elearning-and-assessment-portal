<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Module\AdminStoreAssessmentQuestionRequest;
use App\Http\Resources\Learning\Module\AdminModuleAssessmentQuestionResource;
use App\Http\Resources\Learning\Module\AdminModuleResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssessmentQuestionService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminModuleAssessmentQuestionController extends Controller
{
    protected ModuleAssessmentQuestionService $question;
    protected ModuleService $module;
    public function __construct(
        ModuleAssessmentQuestionService $question,
        ModuleService $module
    ){
        $this->question = $question;
        $this->module = $module;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $questions = $this->question->questionsByModuleId($request->module_id)->get();
            return response()->json([
                'success' => true,
                'questions' => AdminModuleAssessmentQuestionResource::collection($questions),
                'module' => new AdminModuleResource($this->module->moduleById($request->module_id)),
                'total' => $questions->count()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(AdminStoreAssessmentQuestionRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->question->storeQuestion($request);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->question->questionById($request->id);
            return response()->json([
                'success' => true,
                'question' => $data,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function update(AdminStoreAssessmentQuestionRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->question->updateQuestion($request);
            return response()->json($data, Response::HTTP_ACCEPTED);

        } catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->question->deleteQuestion($request->id);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
