<?php

namespace App\Http\Resources\Learning\Course;

use App\Services\Course\CourseService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'previous_course_completed' => $this->module && CourseService::previousCourseCompleted(Auth::user()->id, $this->sort, $this->module->id),
            'next_course' => CourseService::getNextCourse($this->sort) !== null ? CourseService::getNextCourse($this->sort) : false,
            'study_timer' => $this->study_timer,
            'content_type' => $this->content_type,
            'trainers' => $this->trainers,
            'title' => ucwords(strtolower($this->title)),
            'module' => $this->module ?? '',
            'image' => !empty($this->image) ? $this->image_path.$this->image : config('app.app_url').'/images/no-image.jpg',
            'objectives' => $this->objectives,
            'course_outline' => $this->course_outline,
            'video' => $this->video,
            'course_contents' => $this->course_contents,
            'resources' => $this->resources ? CourseResourceResource::collection($this->resources) : [],
            'sort' => $this->sort,
            'status' => $this->status,
        ];
    }
}
