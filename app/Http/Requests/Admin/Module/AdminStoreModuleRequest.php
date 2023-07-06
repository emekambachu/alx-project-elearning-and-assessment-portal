<?php

namespace App\Http\Requests\Admin\Module;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminStoreModuleRequest extends FormRequest
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
            'title' => 'required|unique:brace_modules,title',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'description' => 'nullable',
            'trainers' => 'nullable',
            'training_methods' => 'nullable',
            'start' => 'nullable',
            'end' => 'nullable',
            'sort' => 'nullable|numeric|between:0.00,99.99',
            'status' => 'required',
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
