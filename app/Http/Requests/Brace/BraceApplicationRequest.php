<?php

namespace App\Http\Requests\Brace;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BraceApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' =>  'required|email|unique:users,email',
            'mobile' =>  'required|unique:users,mobile',
            'gender' =>  'required',
            'education' =>  'required',
            'country_id' => 'required',
            'country_residence_id' => 'required',
            'date_of_birth' => 'required',

            'business_name' => 'required',
            'business_email' =>  'required|email|unique:application_businesses,business_email',
            'business_country_id' => 'required',
            'business_registered' => 'required',
            'year_of_operation' => 'required',
            'document' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx,ppt,pptx|max:5048',
            'type_of_business' => 'required',
            'agribusiness_sector' => 'required',
            'value_chain_operation' => 'required',
            'business_stage' => 'required',
            'business_description' => 'required',

            'participated_previous_program' => 'required',
            'participated_climate_program' => 'required',
            'expectations_from_program' => 'required',
            'impact_on_business' => 'required',
            'how_did_you_hear' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'country_id.required' => 'Country is required!',
            'country_residence_id.required' => 'Country residence is required!',
            'business_country_id.required' => 'Business country residence is required!',
            'business_description.required' => 'Brief description of your business? is required!',
            'business_registered.required' => 'Do you have a registered Business? is required!',
            'participated_previous_program.required' => 'Have you participated in any ALX | E-learning and Assessment Portal / Nourishing Africa / Changing Narrative programs before? is required!',
            'participated_climate_program.required' => 'Have you participated in any climate-related training/programs? is required!',
            'expectations_from_program.required' => 'What are your expectations from the program? is required!',
            'impact_on_business.required' => 'How would the program impact your business? is required!',
            'how_did_you_hear.required' => 'How did you hear about this program? is required!',
        ];
    }

    protected function failedValidation(Validator $validator){

        // return errors in json object/array
        $message = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $message
        ]));
    }
}
