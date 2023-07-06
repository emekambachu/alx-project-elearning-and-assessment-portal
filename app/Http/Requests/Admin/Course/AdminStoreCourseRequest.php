<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminStoreCourseRequest extends FormRequest
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
            'title' => 'required|unique:brace_courses,title',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'video' => 'nullable',
            'study_timer' => 'nullable',
            'objectives' => 'nullable',
            'course_outline' => 'nullable',
            'course_contents' => 'nullable',
            'content_type' => 'nullable',
            'trainers' => 'nullable',
            'sort' => 'required',
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
