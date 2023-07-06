<?php

namespace App\Http\Resources\Application;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BraceApplicationSearchResource extends JsonResource
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
            'id' => $this->user_id, // use alias id from mysql join in application search query
            'name' => $this->first_name.' '.$this->middle_name.' '.$this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'gender' => $this->gender,
            'education' => $this->education,
            'image' => !empty($this->image) ? $this->image_path.' '.$this->image : @config('app.app_url').'/images/no-image-user.png',
            'country' => $this->country ? $this->country->country_name : '',
            'country_residence' => $this->country_residence ? $this->country_residence->country_name : '',
            'date_of_birth' => $this->date_of_birth,

            'business_name' => $this->business_name ?? '',
            'business_email' => $this->business_email ?? '',
            'business_country' => $this->business_country_name ?? '',
            'business_registered' => $this->business_registered === 1 ? 'Yes' : 'No',
            'website' => $this->website ?? '',
            'linkedin' => $this->linkedin ?? '',
            'twitter' => $this->twitter ?? '',
            'instagram' => $this->instagram ?? '',
            'facebook' => $this->facebook ?? '',
            'year_of_operation' => $this->year_of_operation ?? '',
            'document' => !empty($this->document) ? $this->document_path.$this->document : '',
            'type_of_business' => $this->type_of_business ?? '',
            'agribusiness_sector' => $this->agribusiness_sector ?? '',
            'value_chain_operation' => $this->value_chain_operation ?? '',
            'business_stage' => $this->business_stage ?? '',
            'business_description' => $this->business_description ?? '',
            'number_of_employees' => $this->number_of_employees ?? '',

            'participated_previous_program' => $this->participated_previous_program ?? '',
            'participated_climate_program' => $this->participated_climate_program ?? '',
            'expectations_from_program' => $this->expectations_from_program ?? '',
            'impact_on_business' => $this->impact_on_business ?? '',
            'how_did_you_hear' => $this->how_did_you_hear ?? '',

            'selected' => $this->selected,
            'last_login' => Carbon::parse($this->last_login)->format('M d Y'),
            'created_at' => Carbon::parse($this->created_at)->format('M d Y'),
        ];
    }
}
