<?php

namespace App\Http\Resources\Learning\Module;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleAssignmentResource extends JsonResource
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
            'description' => $this->description,
            'module' => $this->module ? new AdminModuleResource($this->module) : '',
        ];
    }
}
