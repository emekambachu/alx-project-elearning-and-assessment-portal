<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminUpdateCourseResourceRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'document' => ['nullable', 'sometimes', 'mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx', 'max:15048'],
            'url' => ['nullable','sometimes','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
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
