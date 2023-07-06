<?php

namespace App\Http\Resources\Learning\Module;

use App\Http\Resources\Learning\Course\AdminCourseResource;
use App\Http\Resources\Learning\Course\CourseResource;
use App\Services\Module\ModuleService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AdminModuleResource extends JsonResource
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
            'title' => $this->title,
            'image' => !empty($this->image) ? $this->image_path.$this->image : config('app.app_url').'/images/no-image.jpg',
            'description' => $this->description,
            'trainers' => $this->trainers,
            'training_methods' => $this->training_methods,
            'status' => $this->status,
            'sort' => $this->sort,
            'total_courses' => $this->courses ? $this->courses->count() : 0,
            'courses' => $this->courses ? AdminCourseResource::collection($this->courses) : [],
            'assignments' => $this->assignment ?? [],
            'assessment' => $this->assessment ? new ModuleAssessmentResource($this->assessment) : false,
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('M d Y') : '',
        ];
    }
}
