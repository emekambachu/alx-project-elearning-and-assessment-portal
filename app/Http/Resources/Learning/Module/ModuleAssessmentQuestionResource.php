<?php

namespace App\Http\Resources\Learning\Module;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleAssessmentQuestionResource extends JsonResource
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
            'question' => $this->question,
            'option_one' => $this->option_one,
            'option_two' => $this->option_two,
            'option_three' => $this->option_three,
            'option_four' => $this->option_four,
            'option_five' => $this->option_five,
        ];
    }
}
