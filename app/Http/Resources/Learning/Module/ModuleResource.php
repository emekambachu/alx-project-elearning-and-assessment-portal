<?php

namespace App\Http\Resources\Learning\Module;

use App\Http\Resources\Learning\Course\CourseResource;
use App\Services\Module\ModuleService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ModuleResource extends JsonResource
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
            // If there is a previous module and the previous module has been completed, return true
            'previous_module_completed' => ModuleService::getPreviousModule($this->sort) && ModuleService::previousModuleCompleted(
                Auth::user()->id,
                $this->sort,
                ModuleService::getPreviousModule($this->sort)->id
            ),
            'next_module' => ModuleService::getNextModule($this->sort) !== null ? ModuleService::getNextModule($this->sort) : false,
            'title' => ucwords(strtolower($this->title)),
            'image' => !empty($this->image) ? $this->image_path.$this->image : config('app.app_url').'/images/no-image.jpg',
            'description' => $this->description,
            'trainers' => $this->trainers,
            'training_methods' => $this->training_methods,
            'status' => $this->status,
            'sort' => $this->sort,
            'total_courses' => $this->courses ? $this->courses->count() : 0,
            'courses' => $this->courses ? CourseResource::collection($this->courses) : [],
            'assignments' => $this->assignments ?? [],
            'assessment' => $this->assessment ? new ModuleAssessmentResource($this->assessment) : false,
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('M d Y') : '',
        ];
    }
}
