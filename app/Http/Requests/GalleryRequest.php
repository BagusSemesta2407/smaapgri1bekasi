<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
        if ($this->_method != 'put') {
            $rules['image'] =   'required|mimes:png,jpg,jpeg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'image.required'    =>  'Gambar Wajib Diisi',
            'image.mimes'       =>  'Format File Hanya PNG, JPG Dan JPEG',
            'image.max'         =>  'Ukuran Maksimal File 2MB',
        ];
    }
}
