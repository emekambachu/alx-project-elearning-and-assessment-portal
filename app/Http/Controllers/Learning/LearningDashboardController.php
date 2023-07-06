<?php

namespace App\Http\Controllers\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\Module\ModuleResource;
use App\Services\Base\BaseService;
use App\Services\Course\CourseService;
use App\Services\Module\ModuleService;

class LearningDashboardController extends Controller
{
    protected ModuleService $module;
    protected CourseService $course;
    public function __construct(ModuleService $module, CourseService $course){
        $this->module = $module;
        $this->course = $course;
    }

    public function dashboardSummary(): \Illuminate\Http\JsonResponse
    {
        try {
            $modules = $this->module->braceModule();
            $countModules = $modules->count();
            $getModules = $modules->orderBy('sort')->limit(2)->get();
            $countCourses = $this->course->braceCourse()->count();

            return response()->json([
                'success' => true,
                'total_modules' => $countModules,
                'total_courses' => $countCourses,
                'modules' => ModuleResource::collection($getModules),
                'min_module_sort' => $modules->select('sort')->min('sort'),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
