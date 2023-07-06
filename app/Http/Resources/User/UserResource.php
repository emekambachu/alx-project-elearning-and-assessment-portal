<?php

namespace App\Http\Resources\User;

use App\Services\Base\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->first_name.' '.$this->middle_name.' '.$this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'gender' => $this->gender,
            'education' => $this->education,
            'image' => !empty($this->image) ? config('app.app_url').'/'.$this->image_path.'/'.$this->image : BaseService::noImageUser(),
            'country' => $this->country ? $this->country->country_name : '',
            'country_residence' => $this->country ? $this->country->country_name : '',
            'date_of_birth' => $this->date_of_birth,
            'selected' => $this->selected,
            'last_login' => $this->last_login ? Carbon::parse($this->last_login)->format('M d Y') : '',
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('M d Y') : '',
        ];
    }
}
