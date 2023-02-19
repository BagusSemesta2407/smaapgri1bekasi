<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            $rules['image_url'] =   'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'image_url.required'    =>  'Gambar Wajib Diisi'
        ];
    }
}
