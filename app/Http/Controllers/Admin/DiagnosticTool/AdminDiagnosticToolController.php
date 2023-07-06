<?php

namespace App\Http\Controllers\Admin\DiagnosticTool;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiagnosticTool\DiagnosticToolStatusResource;
use App\Services\Base\BaseService;
use App\Services\Brace\DiagnosticToolService;
use Exception;
use Illuminate\Http\Request;

class AdminDiagnosticToolController extends Controller
{
    protected DiagnosticToolService $diagnostic;
    public function __construct(DiagnosticToolService $diagnostic){
        $this->diagnostic = $diagnostic;
    }

    public function results(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->diagnostic->userDiagnosticStatusWithRelations()
                ->has('user')
                ->orderBy('updated_at', 'desc')->paginate(12);
            return response()->json([
                'success' => true,
                'total' => $data->total(),
                'diagnostics' => DiagnosticToolStatusResource::collection($data)->response()->getData(true),
            ]);

        }catch (Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->diagnostic->searchDiagnostic($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function export($formData)
    {
        try {
            return $this->diagnostic->exportDiagnostic($formData);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
