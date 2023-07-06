<?php

namespace App\Http\Resources\DiagnosticTool;

use App\Http\Resources\User\UserProfileResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticToolStatusResource extends JsonResource
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
            // Always add ID to resource
            'id' => $this->id,
            'user' => $this->user ? new UserProfileResource($this->user) : '',
            'question_id' => $this->question_id,
            'current_question_id' => $this->current_question_id,
            'is_completed' => $this->is_completed === 1,
            'updated_at' => $this->updated_at ? Carbon::parse($this->updated_at)->format('M d Y') : '',
        ];
    }
}
