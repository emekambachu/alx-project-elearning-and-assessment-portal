<?php

namespace App\Http\Requests\Learning;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubmitModuleAssignmentRequest extends FormRequest
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
            'document_one' => ['nullable', 'sometimes', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx', 'max:10048'],
            'document_two' => ['nullable', 'sometimes', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx', 'max:10048'],
            'document_three' => ['nullable', 'sometimes', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx', 'max:10048'],
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
