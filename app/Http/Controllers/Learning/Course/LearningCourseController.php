<?php

namespace App\Http\Controllers\Learning\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\Course\CourseResource;
use App\Http\Resources\Learning\Module\ModuleResource;
use App\Services\Base\BaseService;
use App\Services\Course\CourseService;
use App\Services\Module\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LearningCourseController extends Controller
{
    protected CourseService $course;
    protected ModuleService $module;

    public function __construct(CourseService $course, ModuleService $module){
        $this->course = $course;
        $this->module = $module;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->course->coursesByModuleId($request->module_id)->orderBy('sort')->get();

            return response()->json([
                'success' => true,
                'count' => $data->count(),
                'courses' => CourseResource::collection($data),
                'module' => new ModuleResource($this->module->moduleById($request->module_id)),
                'min_course_sort' => $this->course->braceCourse()
                    ->where('brace_module_id', $request->module_id)
                    ->select('sort')->min('sort'),
                'all_courses_completed' => $this->course->allCoursesCompleted(Auth::user()->id, $request->module_id)
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->course->courseById($request->course_id);
            return response()->json([
                'success' => true,
                'course' => new CourseResource($data),
                'module' => new ModuleResource($data->module),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function storeUserActivity(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $data = $this->course->storeCourseUserActivity($request->course_id, $request->module_id, Auth::user()->id);
            return response()->json($data);

        }catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function getUserActivity(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $data = $this->course->courseUserActivityByCourseId($request->course_id, Auth::user()->id);
            return response()->json($data, Response::HTTP_OK);

        }catch (\Exception $e){
            return BaseService::tryCatchException($e);
        }
    }
}
