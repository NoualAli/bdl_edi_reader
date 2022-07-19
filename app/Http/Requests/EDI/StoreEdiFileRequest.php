<?php

namespace App\Http\Requests\EDI;

use Illuminate\Foundation\Http\FormRequest;

class StoreEdiFileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'edi_file' => ['required', 'file', 'mimetypes:text/plain', 'max:2000']
        ];
    }
}