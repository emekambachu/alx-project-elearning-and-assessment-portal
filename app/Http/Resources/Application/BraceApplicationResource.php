<?php

namespace App\Http\Resources\Application;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BraceApplicationResource extends JsonResource
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
            'image' => !empty($this->image) ? $this->image_path.' '.$this->image : @config('app.app_url').'/images/no-image-user.png',
            'country' => $this->country ? $this->country->country_name : '',
            'country_residence' => $this->country_residence ? $this->country_residence->country_name : '',
            'date_of_birth' => $this->date_of_birth,

            'business_name' => $this->business->business_name ?? '',
            'business_email' => $this->business->business_email ?? '',
            'business_country' => $this->business && $this->business->country ? $this->business->country->country_name : '',
            'business_registered' => $this->business && $this->business->business_registered === 1 ? 'Yes' : 'No',
            'website' => $this->business ? $this->business->website : '',
            'linkedin' => $this->business ? $this->business->linkedin : '',
            'twitter' => $this->business ? $this->business->twitter : '',
            'instagram' => $this->business ? $this->business->instagram : '',
            'facebook' => $this->business ? $this->business->facebook : '',
            'year_of_operation' => $this->business ? $this->business->year_of_operation : '',
            'document' => $this->business && !empty($this->business->document) ? $this->business->document_path.$this->business->document : '',
            'type_of_business' => $this->business ? $this->business->type_of_business : '',
            'agribusiness_sector' => $this->business ? $this->business->agribusiness_sector : '',
            'value_chain_operation' => $this->business ? $this->business->value_chain_operation : '',
            'business_stage' => $this->business ? $this->business->business_stage : '',
            'business_description' => $this->business ? $this->business->business_description : '',
            'number_of_employees' => $this->business ? $this->business->number_of_employees : '',

            'participated_previous_program' => $this->question ? $this->question->participated_previous_program : '',
            'participated_climate_program' => $this->question ? $this->question->participated_climate_program : '',
            'expectations_from_program' => $this->question ? $this->question->expectations_from_program : '',
            'impact_on_business' => $this->question ? $this->question->impact_on_business : '',
            'how_did_you_hear' => $this->question ? $this->question->how_did_you_hear : '',

            'selected' => $this->selected,
            'last_login' => Carbon::parse($this->last_login)->format('M d Y'),
            'created_at' => Carbon::parse($this->created_at)->format('M d Y'),
        ];
    }
}
