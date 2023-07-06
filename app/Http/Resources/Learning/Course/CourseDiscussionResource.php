<?php

namespace App\Http\Resources\Learning\Course;

use App\Services\Base\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseDiscussionResource extends JsonResource
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
            'name' => $this->user ? $this->user->first_name.' '.$this->user->last_name : '',
            'image' => $this->user && !empty($this->user->image) ? config('app.app_url').'/'.$this->user->image_path.'/'.$this->user->image : BaseService::noImageUser(),
            'comment' => $this->comment,
            'likes' => $this->likes->count(),
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('M d Y') : '',
        ];
    }
}
