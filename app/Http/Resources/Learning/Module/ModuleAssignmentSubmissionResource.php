<?php

namespace App\Http\Resources\Learning\Module;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleAssignmentSubmissionResource extends JsonResource
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

            'document_one_name' => $this->document_one,
            'document_two_name' => $this->document_one,
            'document_three_name' => $this->document_one,

            'document_one' => !empty($this->document_one) ? config('app.app_url').'/'.$this->document_path.'/'.$this->document_one : '',
            'document_two' => !empty($this->document_two) ? config('app.app_url').'/'.$this->document_path.'/'.$this->document_two : '',
            'document_three' => !empty($this->document_three) ? config('app.app_url').'/'.$this->document_path.'/'.$this->document_three : '',
        ];
    }
}
