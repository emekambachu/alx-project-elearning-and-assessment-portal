<?php

namespace App\Services\Course;

use App\Http\Resources\Learning\Course\AdminCourseResource;
use App\Http\Resources\Learning\Course\CourseResource;
use App\Models\Learning\Course\BraceCourse;
use App\Models\Learning\Course\BraceCourseView;
use App\Services\Base\CrudService;
use Illuminate\Support\Facades\File;

class CourseService
{
    protected string $imagePath = 'photos/course';

    public function braceCourse(): BraceCourse
    {
        return new BraceCourse();
    }

    public function courseWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceCourse()->with('module', 'discussions', 'course_views', 'resources');
    }

    public function courseById($id)
    {
        return $this->courseWithRelations()->findOrFail($id);
    }

    public function courseActivities(): BraceCourseView
    {
        return new BraceCourseView();
    }

    public function courseActivitiesWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->courseActivities()->with('user', 'module', 'course');
    }

    public function courseActivitiesById($id)
    {
        return $this->courseActivitiesWithRelations()->findOrFail($id);
    }

    public function courseUserActivityByCourseId($courseId, $userId)
    {
        return $this->courseActivitiesWithRelations()->where([
            ['brace_course_id', $courseId],
            ['user_id', $userId],
            ['status', 1],
        ])->first();
    }

    public static function getNextCourse($currentCoursePosition){
        return BraceCourse::with('course_views')
            ->where('sort', '>',  $currentCoursePosition)
            ->orderBy('sort', 'asc')->first();
    }

    public static function getPreviousCourse($currentCoursePosition, $moduleId){
        return BraceCourse::with('course_views', 'module')
            ->where([
                ['brace_module_id', $moduleId],
                ['sort', '<',  $currentCoursePosition]
            ])->orderBy('sort', 'desc')->first();
    }

    public static function previousCourseCompleted($userId, $currentCoursePosition, $moduleId): bool
    {
        // Get previous course
        $previousCourse = self::getPreviousCourse($currentCoursePosition, $moduleId);

        // if previous course exists, iterate brace_course_views table
        // check if course views status is completed for previous course and user, if so return true
        if($previousCourse){
            foreach($previousCourse->course_views as $activity){
                if($activity->status === 1 && $activity->user_id === $userId && $activity->brace_course_id === $previousCourse->id){
                    return true;
                }
            }
        }
        return false;
    }

    public function allCoursesCompleted($userId, $moduleId): bool
    {
        $countCoursesInModule = $this->coursesByModuleId($moduleId)->count();
        $countCoursesCompletedByUser = $this->courseActivitiesWithRelations()->where([
                                            ['user_id', $userId],
                                            ['brace_module_id', $moduleId],
                                            ['status', 1]
                                        ])->count();

        if($countCoursesInModule === $countCoursesCompletedByUser){
            return true;
        }
        return false;
    }

    public function coursesByModuleId($moduleId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->courseWithRelations()->where('brace_module_id', $moduleId);
    }

    public function storeCourse($request): array
    {
        $inputs = $request->all();
        // update status and upload files
        $inputs['status'] = $inputs['status'] === "1" ? 1 : 0;
        $inputs['image'] = CrudService::uploadAndCompressImage($request, $this->imagePath, null, null, 'image');
        $inputs['image_path'] = config('app.app_url').'/'.$this->imagePath.'/';

        $course = $this->braceCourse()->create($inputs);
        return [
            'success' => true,
            'course' => new AdminCourseResource($course)
        ];
    }

    public function updateCourse($request): array
    {
        $inputs = $request->all();
        $course = $this->courseById($request->id);

        $inputs['status'] = $inputs['status'] === "1" ? 1 : 0;
        if(isset($inputs['image'])){
            $inputs['image'] = CrudService::uploadAndCompressImage($request, $this->imagePath, null, null, 'image');
        }else{
            $inputs['image'] = $course->image;
        }

        $inputs['image_path'] = config('app.app_url').'/'.$this->imagePath.'/';
        $course->update($inputs);

        return [
            'success' => true,
            'course' => new AdminCourseResource($course)
        ];
    }

    public function deleteCourse($request): array
    {
        $course = $this->courseById($request->id);
        if(!empty($course->image) && File::exists(public_path() . '/'.$this->imagePath.'/' . $course->image)){
            FILE::delete(public_path() . '/'.$this->imagePath.'/' . $course->image);
        }
        $course->delete();

        return [
            'success' => true,
            'message' => 'deleted'
        ];
    }

    public function storeCourseUserActivity($courseId, $moduleId, $userId): array
    {
        // get user course activity from course_views table
        $activity = $this->courseUserActivityByCourseId($courseId, $userId);
        if(!$activity){
            $this->courseActivities()->create([
                'user_id' => $userId,
                'brace_course_id' => $courseId,
                'brace_module_id' => $moduleId,
                'status' => 1
            ]);
        }

        return [
          'success' => true,
          'message' => 'Course Viewed'
        ];
    }
}
