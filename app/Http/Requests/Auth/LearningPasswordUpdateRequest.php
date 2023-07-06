<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LearningPasswordUpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages(): array
    {
        return [

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
