<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'doc_name' => 'required',
            'doc_file' => 'required|file|max:20480'
        ];
    }

    public function messages()
    {
        return [
            'doc_name.required' => 'Title field is required.',
            'doc_file.required' => 'Pleas upload a file.',
            'doc_file.max' => 'The uploaded file must be less than 20MB.'
        ];
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('addDocument');
    }
}
