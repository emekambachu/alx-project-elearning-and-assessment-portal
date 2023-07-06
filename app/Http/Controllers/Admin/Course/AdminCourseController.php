<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\AdminStoreCourseRequest;
use App\Http\Requests\Admin\Course\AdminUpdateCourseRequest;
use App\Http\Resources\Learning\Course\AdminCourseResource;
use App\Http\Resources\Learning\Course\CourseResource;
use App\Services\Base\BaseService;
use App\Services\Course\CourseService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCourseController extends Controller
{
    protected CourseService $course;
    protected ModuleService $module;
    public function __construct(CourseService $course, ModuleService $module){
        $this->course = $course;
        $this->module = $module;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $courses = $this->course->courseWithRelations()->latest()->paginate(12);
            return response()->json([
                'success' => true,
                'courses' => CourseResource::collection($courses)->response()->getData(true),
                'total' => $courses->total()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function moduleCourses(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $courses = $this->course->coursesByModuleId($request->module_id)
                ->orderBy('sort', 'asc')->paginate(12);
            return response()->json([
                'success' => true,
                'courses' => AdminCourseResource::collection($courses)->response()->getData(true),
                'module' => $this->module->moduleById($request->module_id),
                'total' => $courses->total()
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function store(AdminStoreCourseRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->course->storeCourse($request);
            return response()->json($data, Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function update(AdminUpdateCourseRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->course->updateCourse($request);
            return response()->json($data, Response::HTTP_ACCEPTED);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->course->deleteCourse($request);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
