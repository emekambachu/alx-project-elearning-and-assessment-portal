<?php

namespace App\Http\Resources\Learning\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResourceResource extends JsonResource
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
            'brace_course_id' => $this->brace_course_id,
            'title' => $this->title,
            'document' => !empty($this->document) ? $this->document_path.$this->document : '',
            'document_path' => !empty($this->document) ? $this->document_path : '',
            'document_name' => !empty($this->document) ? $this->document : '',
            'url' => $this->url,
        ];
    }
}
