<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Module\AdminStoreModuleRequest;
use App\Http\Requests\Admin\Module\AdminUpdateModuleRequest;
use App\Http\Resources\Learning\Module\AdminModuleResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminModuleController extends Controller
{
    protected ModuleService $module;
    public function __construct(ModuleService $module){
        $this->module = $module;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $modules = $this->module->moduleWithRelations()
                ->orderBy('sort', 'asc')->paginate(12);
            return response()->json([
                'success' => true,
                'modules' => AdminModuleResource::collection($modules)->response()->getData(true),
                'total' => $modules->total()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(AdminStoreModuleRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->storeModule($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->moduleById($request->id);
            return response()->json([
                'success' => true,
                'module' => $data,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function update(AdminUpdateModuleRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->updateModule($request);
            return response()->json($data, Response::HTTP_ACCEPTED);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->module->deleteModule($request);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
