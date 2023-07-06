<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\AdminStoreCourseResourceRequest;
use App\Http\Requests\Admin\Course\AdminUpdateCourseResourceRequest;
use App\Http\Resources\Learning\Course\AdminCourseResource;
use App\Http\Resources\Learning\Course\CourseResourceResource;
use App\Services\Base\BaseService;
use App\Services\Course\CourseResourceService;
use App\Services\Course\CourseService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCourseResourceController extends Controller
{
    protected CourseResourceService $resource;
    protected CourseService $course;
    public function __construct(
        CourseResourceService $resource,
        CourseService $course
    ){
        $this->resource = $resource;
        $this->course = $course;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $resources = $this->resource->resourcesByCourseId($request->course_id)->get();
            return response()->json([
                'success' => true,
                'resources' => CourseResourceResource::collection($resources),
                'course' => new AdminCourseResource($this->course->courseById($request->course_id)),
                'total' => $resources->count()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(AdminStoreCourseResourceRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->resource->storeResource($request);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->resource->resourceById($request->id);
            return response()->json([
                'success' => true,
                'resource' => $data,
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function update(AdminStoreCourseResourceRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->resource->updateResource($request);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->resource->deleteResource($request->id);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
