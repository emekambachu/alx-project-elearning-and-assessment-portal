<?php

namespace App\Http\Requests\Admin\Module;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminStoreAssessmentQuestionRequest extends FormRequest
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
            'brace_module_id' => 'required',
            'question' => 'required|string',
            'option_one' => 'required|string',
            'option_two' => 'required|string',
            'option_three' => 'nullable|string',
            'option_four' => 'nullable|string',
            'option_five' => 'nullable|string',
            'correct_answer' => 'required',
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
