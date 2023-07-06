<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Learning\Module\ModuleAssessmentResource;
use App\Services\Base\BaseService;
use App\Services\Module\ModuleAssessmentService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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

            'business_name' => $this->business ? $this->business->business_name : '',
            'business_email' => $this->business ? $this->business->business_email : '',
            'business_country' => $this->business && $this->business->country ? $this->business->country->country_name : '',
            'business_registered' => $this->business && $this->business->business_registered === 1 ? 'Yes' : 'No',

            'module_assessments' => $this->module_assessments && count($this->module_assessments) > 0 ? ModuleAssessmentResource::collection($this->module_assessments) : [],
            'overall_assessments' => ModuleAssessmentService::accumulatedAssessmentScoreStatic($this->id)
        ];
    }
}
