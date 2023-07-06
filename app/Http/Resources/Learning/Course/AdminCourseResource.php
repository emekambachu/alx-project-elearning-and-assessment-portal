<?php

namespace App\Http\Resources\Learning\Course;

use App\Services\Course\CourseService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AdminCourseResource extends JsonResource
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
            'brace_module_id' => $this->brace_module_id,
            'title' => $this->title,
            'module' => $this->module ?? '',
            'image' => !empty($this->image) ? $this->image_path.$this->image : config('app.app_url').'/images/no-image.jpg',
            'video' => $this->video,
            'study_timer' => $this->study_timer,
            'objectives' => $this->objectives,
            'course_outline' => $this->course_outline,
            'course_contents' => $this->course_contents,
            'content_type' => $this->content_type,
            'trainers' => $this->trainers,
            'sort' => $this->sort,
            'status' => $this->status,
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('M d Y') : '',
        ];
    }
}
