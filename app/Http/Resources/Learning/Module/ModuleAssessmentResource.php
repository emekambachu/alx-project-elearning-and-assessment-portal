<?php

namespace App\Http\Resources\Learning\Module;

use App\Services\User\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleAssessmentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'module_id' => $this->brace_module_id,
            'module_title' => $this->module ? $this->module->title : '',
            'status' => $this->status,
            'retake' => $this->retake,
            'score' => $this->score,
            'percent' => $this->percent,
            'passed' => $this->passed,
        ];
    }
}
