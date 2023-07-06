<?php

namespace App\Http\Controllers\Learning;

use App\Http\Resources\User\UserResource;
use App\Services\Base\BaseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Brace\DiagnosticToolService;
use Illuminate\Support\Facades\Auth;

class DiagnosticToolsController extends Controller
{
    protected DiagnosticToolService $diagnosticToolsService;

    public function __construct(DiagnosticToolService $diagnosticToolsService){
        $this->diagnosticToolsService = $diagnosticToolsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(){
        return $this->diagnosticToolsService->fetchDiagnosticTool();
    }

    public function getOneQuestion($id){
        return $this->diagnosticToolsService->fetchOneDiagnosticTool($id);
    }

    public function editOneQuestion(Request $request, $id){
        return $this->diagnosticToolsService->editOneDiagnosticTool($request, $id);
    }

    public function deleteOneQuestion($id){
        return $this->diagnosticToolsService->deleteOneDiagnosticTool($id);
    }

    public function userDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = BaseService::getUserFromToken($request->token);
        return response()->json([
            'success' => $data['success'],
            'user' => new UserResource($data['user']->load(['business', 'country'])) // load relationships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $response = $this->diagnosticToolsService->createQuestions($request);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return $this->sendError($response['response_message'], $response['data']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiagnosticTools  $diagnosticTools
     * @return \Illuminate\Http\Response
     */
    public function addUserAnswers(Request $request)
    {
        return $response = $this->diagnosticToolsService->add_user_answers($request);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return [
                "response_message" => $response['response_message'],
                "data" => $response['data']
            ];
        }
    }

    public function fetchUserAnswers(Request $request)
    {
        return $response = $this->diagnosticToolsService->fetch_user_answers($request);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return $this->sendError($response['response_message'], $response['data']);
        }
    }

    public function fetchUserAnswersById($id)
    {
        return $response = $this->diagnosticToolsService->fetch_user_answers_by_id($id);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return $this->sendError($response['response_message'], $response['data']);
        }
    }

    public function getAnswerStatus(Request $request)
    {
        return $response = $this->diagnosticToolsService->fetch_user_answers_status($request);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return $this->sendError($response['response_message'], $response['data']);
        }
    }

    public function createOrUpdateAnswerStatus(Request $request)
    {
        return $response = $this->diagnosticToolsService->create_or_update_answer_status($request);

        if ($response['status']) {
            return $this->sendResponse($response['data'], $response['response_message']);
        } else {
            return $this->sendError($response['response_message'], $response['data']);
        }
    }

    public function diagnosticCompleted(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->diagnosticToolsService->userCompletedDiagnostic(Auth::user()->id);
            return response()->json([
                'success' => true,
                'completed' => (bool)$data,
            ]);
        }catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }
}
